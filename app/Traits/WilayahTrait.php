<?php


namespace App\Traits;

use App\Models\RefWilayah;

trait WilayahTrait
{
    public function initializeWilayahTrait()
    {
        $this->fillable[] = 'id_wilayah';
        $this->appends[] = 'wilayah';
    }

    /**
     * Relation to RefWilayah
     *
     * @return BelongsTo
     */
    public function getWilayahAttribute()
    {
        $data = $this->belongsTo(RefWilayah::class, 'id_wilayah', 'id_wilayah')->with('parent')->first();
        if (!$data) {
            return null;
        }

        $wilayah = RefWilayah::flattenWilayah($data->toArray());

        return collect([
            'id' => (string) $data->id_wilayah,
            'wilayah' => $wilayah
        ])->toBase();
    }

    public function wilayahRelation()
    {
        return $this->belongsTo(RefWilayah::class, 'id_wilayah', 'id_wilayah')->with('parent');
    }
}