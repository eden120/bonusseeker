<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['is_active', 'sort_by', 'name', 'slug', 'url', 'seo_title', 'seo_description', 'seo_keywords',];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}