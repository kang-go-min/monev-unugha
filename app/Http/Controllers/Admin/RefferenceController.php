<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetAllWilayahsRequest;
use App\Models\RefWilayah;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RefferenceController extends Controller
{
    /**
     * @param GetAllWilayahsRequest $request
     * @return array
     */
    public function getAllWilayah(GetAllWilayahsRequest $request)
    {
        $data = AdminListing::create(RefWilayah::class)->processRequestAndGet(
        // pass the request with params
            $request,
            // set columns to query
            ['id_wilayah', 'kode_wilayah', 'nm_wilayah', 'id_induk_wilayah', 'id_level_wilayah'],
            // set columns to searchIn
            ['id_wilayah', 'nm_wilayah'],
            // custom query
            function ($query) use ($request) {
                $query = $query->with(['parent']);

                if (!$request->has('all')) {
                    $query = $query->whereIn('id_wilayah', ['0000000000', env('WILAYAH_DEFAULT')])
                        ->orWhere('id_induk_wilayah', 'like', env('WILAYAH_DEFAULT', '0000000000') . '%');
                }

                if ($request->has('level')) {
                    $query = $query->whereIn('id_level_wilayah', explode(',', $request->get('level')));
                }

                return $query;
            }
        )->toArray();

        //dd($data);
        //if ($request->ajax()) {
        $data = [
            'data' => collect($data['data'])->map(function ($value) {

                //dd($value);
                if (isset($value['parent'])) {
                    return [
                        'id' => (int) $value['id_wilayah'],
                        'wilayah' => $this->flattenWilayah($value)
                    ];
                }

                return [
                    'id' => (int) $value['id_wilayah'],
                    'wilayah' => Str::title($value['nm_wilayah'])
                ];
            })
        ];
        //}
        return response()->json($data);
    }

    private function flattenWilayah($data)
    {
        if ($data['object'] == 'Negara' || $data['object'] == 'Kab/Kota') {
            $result[] = Str::title(str_replace('.', ':', $data['nm_wilayah']));
        } else {
            $result[] = $data['object'] . ': ' . Str::title($data['nm_wilayah']);
        }

        if (isset($data['parent'])) {
            $result[] = $this->flattenWilayah($data['parent']);
        }
        return implode(', ', $result);
    }

}
