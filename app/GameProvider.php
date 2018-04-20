<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameProvider extends Model
{
    protected $fillable = ['is_active', 'name', 'slug', 'cta_text', 'cta_link',];

    public function game()
    {
        return $this->hasMany(Game::class);
    }
}