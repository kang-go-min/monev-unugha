<?php


namespace App\Traits;


use App\User;
use Modules\Pemilu\Entities\Pemilu;

trait UserTrait
{
    public function initializeUserTrait ()
    {
        $this->fillable[] = 'created_by';
        $this->fillable[] = 'updated_by';
        $this->fillable[] = 'deleted_by';
    }

    protected static function bootUserTrait()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });

        static::deleting(function ($model) {
            $model->deleted_by = auth()->id();
        });
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

}