<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $fillable = [
        'is_active', 'name', 'slug', 'seo_title', 'seo_description', 'seo_keywords',
    ];
}
