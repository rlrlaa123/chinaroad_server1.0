<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    protected $fillable = [
        'type',
        'chinese_c',
        'chinese_e',
        'korean',
        'audio',
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
