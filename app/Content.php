<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'activate',
        'image',
        'title_ko',
        'audio_ko',
        'contents_ko',
    ];

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }
}
