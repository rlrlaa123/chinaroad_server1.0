<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'inquires';

    protected $fillable = [
        'title',
        'contents',
        'reply',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
