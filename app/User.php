<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password' , 'status', 'activation_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function sendPasswordResetNotification($token)
{
    $this->notify(new Notifications\MailResetPasswordNotification($token));
}
/**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function followers()
{
    return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
}

/**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function followings()
{
    return $this->belongsToMany(User::class, 'followers', 'follower_id', 'leader_id')->withTimestamps();
}

}


