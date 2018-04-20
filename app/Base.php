<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Base extends Model
{
    protected $guard = 'admin';

    public static function boot()
    {
        parent::boot();
        static::creating(function (Model $model, $guard = 'admin') {
            $model->created_by = Auth::guard($guard)->user()->id;
            $model->updated_by = Auth::guard($guard)->user()->id;
        });
        static::updating(function (Model $model, $guard = 'admin') {
            $model->updated_by = Auth::guard($guard)->user()->id;
        });
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}