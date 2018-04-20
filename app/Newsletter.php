<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model {
    protected $fillable = ['is_active', 'first_name', 'last_name', 'email', 'ip_address'];
}
