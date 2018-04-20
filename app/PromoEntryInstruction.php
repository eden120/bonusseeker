<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoEntryInstruction extends Model
{
    protected $fillable = ['is_active', 'name', 'slug'];
}