<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edit extends Model
{
    protected $fillable = [
        'date',
        'level',
        'image',
        'question_ko',
        'question_audio_ko',
        'question_ch',
        'question_audio_ch',
        'answer_ko',
        'answer_audio_ko',
        'answer_ch',
        'answer_audio_ch',
    ];
}
