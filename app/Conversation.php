<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'name',
        'image',
        'video',
    ];

    public function lists()
    {
        return $this->belongsTo(Lists::class);
    }

    public function sentences()
    {
        return $this->hasMany(Sentence::class);
    }
}