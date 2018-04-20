<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatorSlider extends Model
{
    protected $fillable = ['casino_id', 'is_active', 'uuid', 'name', 'slider_image'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function casino()
    {
        return $this->belongsTo(Casino::class);
    }
}