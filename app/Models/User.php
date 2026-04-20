<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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

    public function videos()
    {
        return $this->hasMany(Videos::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    // subscriptions the user has made
    public function subscriptions()
    {
        return $this->hasMany(Subscriber::class, 'subscriber_id');

        return $this->hasMany(Subscriber::class, 'user_id');

    }

    // subscribers of this user
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class, 'channel_id');
    }

    public function likes()
    {
        return $this->hasMany(VideoLike::class)->where('is_like', true);
    }

    public function dislikes()
    {
        return $this->hasMany(VideoLike::class)->where('is_like', false);
    }
}
