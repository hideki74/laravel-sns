<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Mail\BareMail;
use App\Notifications\PasswordResetNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token, new BareMail()));
    }

    public function articles(): HasMany {
        return $this->hasMany('App\Article');
    }

    public function followers(): BelongsToMany {
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimeStamps();
    }

    public function followings(): BelongsToMany {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    public function likes(): BelongsToMany {
        return $this->belongsToMany('App\Article', 'likes')->withTimestamps();
    }

    public function isFollowedBy(?User $user): bool {
        return $user ? (bool)$this->followers->where('id', $user->id)->count() : false;
    }

    public function getCountFollowersAttribute(): int {
        return $this->followers->count();
    }

    public function getCountFollowingsAttribute(): int {
        return $this->followings->count();
    }

    public function getCountArticlesAttribute(): int {
        return $this->articles->count();
    }

    public function getCountLikesAttribute(): int {
        return $this->likes->count();
    }

    public function getCountGetLikesAttribute(): int {
        $liked_cnt = 0;
        foreach ($this->articles as $article) {
            $liked_cnt += $article->likes->count();
        }
        return $liked_cnt;
    }
}
