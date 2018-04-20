<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
       'region_id', 'is_active', 'name', 'slug', 'description', 'seo_title', 'seo_description', 'seo_keywords',
    ];

    public function module()
    {
        return $this->hasMany(PageModule::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}