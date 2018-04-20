<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'provider_id', 'subcategory_id', 'is_active', 'is_featured', 'is_html5', 'name', 'slug', 'logo', 'description', 'url', 'seo_title', 'seo_description', 'seo_keywords',
    ];

    public function providerId()
    {
        return $this->belongsTo(GameProvider::class, 'provider_id');
    }

    public function categoryId()
    {
        return $this->belongsTo(GameCategory::class, 'category_id');
    }

    public function subcategoryId()
    {
        return $this->belongsTo(GameSubcategory::class, 'subcategory_id');
    }
}