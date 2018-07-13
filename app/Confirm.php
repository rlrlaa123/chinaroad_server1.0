<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    protected $fillable = [
        'reply',
        'state',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function edit()
    {
        return $this->belongsTo(Edit::class);
    }
}