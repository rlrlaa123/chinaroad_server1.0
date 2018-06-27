<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{

    protected $fillable = [
        'name',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

}
