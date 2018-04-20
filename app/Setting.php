<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name', 'slogan', 'author', 'owner', 'email', 'phone', 'logo', 'google_analytics', 'facebook_analytics', 'google_site_verification', 'bing_site_verification', 'seo_title', 'seo_description', 'seo_keywords',
    ];
}