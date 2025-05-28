<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class threadLike extends Model
{
    protected $fillable = [
        'user_id',
        'thread_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function thread(): BelongsTo
    {
        return $this->belongsTo(thread::class, 'thread_id');
    }
}
