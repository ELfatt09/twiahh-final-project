<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class thread extends Model
{
    protected $fillable = [
        'body',
        'user_id',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function medias(): HasMany
    {
        return $this->hasMany(threadMedia::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(threadLike::class);
    }

    public function saves(): HasMany
    {
        return $this->hasMany(threadSave::class);
    }

    public function repliedTo(): BelongsTo
    {
        return $this->belongsTo(thread::class, 'parent_id');
    }
    public function replies(): HasMany
    {
        return $this->hasMany(thread::class, 'parent_id');
    }
    public function reposts(): HasMany
    {
        return $this->hasMany(thread::class, 'repost_id');
    }
    public function repostedFrom(): BelongsTo
    {
        return $this->belongsTo(thread::class, 'repost_id');
    }
}
