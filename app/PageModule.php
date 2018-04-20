<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageModule extends Model
{
    protected $fillable = [
        'page_id', 'is_active', 'title', 'contents', 'sort_by', 'seo_title', 'seo_description', 'seo_keywords',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}