<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'level',
        'image',
        'description',
    ];

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}
