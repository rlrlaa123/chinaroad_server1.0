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

    public function lists()
    {
        return $this->hasMany(Lists::class);
    }
}
