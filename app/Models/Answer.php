<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    protected $table = 'answer';

    protected $fillable = [
        'survey_id',
        'user_id',
        'ip_address',
        'json',

    ];

    protected $dates = [
        'created_at',
        'updated_at',

    ];
    protected $casts = [
        'json' => 'array'
    ];

    protected $appends = ['resource_url'];
    protected $with = ['survey', 'user'];

    protected static function boot()
    {
        parent::boot();
        if ($user = Auth::user()) {
            static::creating(function ($model) {
                $model->user_id = auth()->id();
            });
        }
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/answers/' . $this->getKey());
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
