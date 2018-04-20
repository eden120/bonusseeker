<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoType extends Model
{
    protected $fillable = ['is_active', 'name', 'slug'];
}