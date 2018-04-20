<?php

namespace App;

class Region extends Base {
    protected $fillable = [
        'is_active',
        'name',
        'slug',
        'region_contents_top',
        'region_contents',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    public static function boot() {
        parent::boot();
    }

    public function page() {
        return $this->hasMany(Page::class);
    }

    public function casino() {
        return $this->hasMany(Casino::class);
    }

    /*
     * Use Slug Instead of ID
     */
    public function getRouteKeyName() {
        return 'slug';
    }
}