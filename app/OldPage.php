<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldPage extends Model
{
    protected $fillable = [
        'is_active', 'sort_by', 'name', 'slug', 'page_contents', 'featured_image', 'seo_title', 'seo_description', 'seo_keywords',
    ];

    /*
     * Use Slug Instead of ID
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}