<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class threadMedia extends Model
{
    protected $table = 'thread_medias';
    protected $fillable = [
        'thread_id',
        'path',
    ];
}
