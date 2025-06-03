<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
       return $this->is_admin == true or $this->is_admin == 1;
    }

    public function pfp()
    {
        return $this->hasOne(userPfpMedia::class);
    }

    public function isFollowedByUser(int $userId): bool
    {
        return $this->followers()->where('user_id', $userId)->count() > 0;
    }

public function followedThreads()
{
    return $this->belongsToMany(thread::class, 'follows', 'user_id', 'follow_id' , 'thread_id');
}

    public function threads()
    {
        return $this->hasMany(thread::class);
    }
    public function threadSaves()
    {
        return $this->hasMany(ThreadSave::class);
    }

    public function savedThreads(): HasMany
    {
        return $this->threadSaves()->thread();
    }

    public function threadLikes()
    {
        return $this->hasMany(threadLike::class);
    }

    public function likedThreads()
    {
        return $this->threadLikes()->with('thread');
    }

    public function follows()
    {
        return $this->hasMany(follow::class, 'user_id');
    }

    public function followers()
    {
        return $this->hasMany(follow::class, 'follow_id');
    }
}
