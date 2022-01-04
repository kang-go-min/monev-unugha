<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Watson\Rememberable\Rememberable;

class RefWilayah extends Model
{
    use Rememberable;

    protected $table = 'ref_wilayah';
    protected $with = ['levelWilayah'];
    protected $primaryKey = 'id_wilayah';
    protected $appends = ['object'];

    //public $rememberCacheTag = 'wilayah_queries';
    public $rememberFor = 60 * 72; // 3 hari

    /*protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('withDefaultWilayah', function (Builder $builder) {
            $builder->where('id_wilayah', env('WILAYAH_DEFAULT', '0000000000'));
        });
    }*/

    public function children()
    {
        $kids = $this->hasMany(RefWilayah::class, 'id_induk_wilayah', 'id_wilayah')
            ->with('children')
            ->orderBy('id_wilayah', 'DESC');

        return $kids;
    }

    public function parent()
    {
        $dad = $this->belongsTo(RefWilayah::class, 'id_induk_wilayah', 'id_wilayah')
            ->with('parent')
            ->orderBy('id_wilayah', 'DESC');

        return $dad;
    }

    public function levelWilayah()
    {
        return $this->belongsTo(RefLevelWilayah::class, 'id_level_wilayah', 'id_level_wilayah');
    }

    public function scopeWithParent($query)
    {
        return $this->with('parent');
    }

    public function getObjectAttribute()
    {
        return $this->levelWilayah->nm_level_wilayah ?? null;
    }

    public static function flattenWilayah($data)
    {
        if ($data['object'] == 'Negara' || $data['object'] == 'Kab/Kota') {
            $result[] = Str::title(str_replace('.', ':', $data['nm_wilayah']));
        } else {
            $result[] = $data['object'] . ': ' . Str::title($data['nm_wilayah']);
        }

        if (isset($data['parent'])) {
            $result[] = self::flattenWilayah($data['parent']);
        }

        return implode(',', $result);
    }
}
