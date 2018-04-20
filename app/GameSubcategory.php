<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameSubcategory extends Model
{
    protected $fillable = ['is_active', 'category_id', 'name', 'slug', 'description', 'seo_title', 'seo_description', 'seo_keywords',];

    public function gameCategory()
    {
        return $this->belongsTo(GameCategory::class, 'category_id');
    }
}