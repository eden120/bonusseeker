<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
    protected $fillable = ['is_active', 'name', 'slug', 'description', 'seo_title', 'seo_description', 'seo_keywords',];
}