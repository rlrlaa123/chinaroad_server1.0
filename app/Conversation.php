<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'name',
        'korean1',
        'chinese_c1',
        'chinese_e1',
        'audio1',
        'korean2',
        'chinese_c2',
        'chinese_e2',
        'audio2',
        'korean3',
        'chinese_c3',
        'chinese_e3',
        'audio3',
        'korean4',
        'chinese_c4',
        'chinese_e4',
        'audio4',
        'korean5',
        'chinese_c5',
        'chinese_e5',
        'audio5',
        'korean6',
        'chinese_c6',
        'chinese_e6',
        'audio6',
        'korean7',
        'chinese_c7',
        'chinese_e7',
        'audio7',
        'korean8',
        'chinese_c8',
        'chinese_e8',
        'audio8',
        'korean9',
        'chinese_c9',
        'chinese_e9',
        'audio9',
        'korean10',
        'chinese_c10',
        'chinese_e10',
        'audio10',
        'image1',
        'image2',
        'video1',
        'video2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}