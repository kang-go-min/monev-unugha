<?php

namespace App\Models;

use App\Traits\ConvertAlwaysDateTimeToDefaultTimezoneTrait;
use App\Traits\UserTrait;
use Brackets\AdminAuth\Models\AdminUser;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class Survey extends Model implements HasMedia
{
    use SoftDeletes, Sluggable, HasRoles;
    use ProcessMediaTrait, AutoProcessMediaTrait, HasMediaCollectionsTrait, HasMediaThumbsTrait;

    protected $table = 'survey';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'start_date',
        'end_date',
        'json',
        'slug'
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'json' => 'array'
    ];

    protected $appends = ['resource_url', 'results_url'];

    protected static function boot()
    {
        parent::boot();
        if ($user = Auth::user()) {
            static::creating(function ($model) {
                $model->user_id = auth()->id();
            });
        }
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('survey');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();
    }

    public function user()
    {
        return $this->belongsTo(AdminUser::class, 'user_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'survey_id');
    }

    /* ************************ ACCESSOR ************************* */

    public function getImageUrlAttribute()
    {
        $media = $this->getMedia('survey');
        if (isset($media[0])) {
            return $media[0]->getUrl();
        }

        return asset('themes/default/img-temp/200x200/img5.jpg');
    }

    public function getResourceUrlAttribute()
    {
        return url('/admin/surveys/' . $this->getKey());
    }

    public function getResultsUrlAttribute()
    {
        return url('/api/surveys/' . $this->getRouteKey());
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->timezone(config('app.timezone'))->format($this->dateFormat);
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->timezone(config('app.timezone'))->format($this->dateFormat);
    }
}
