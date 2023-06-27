<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Posts;
use App\Models\Profile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Profile(){
        return $this->hasOne(Profile::class);
    }

    public function Posts(){
        return $this->hasMany(Posts::class);
    }


    public function sendEmailVerificationNotification()
    {
         $this->notify(new \App\Notifications\VerifyEmailQueue);
    }

    public function followBy(User $user){
    //    return  $this->following()->where('Follower_id', $user->id);
     // return $this->Posts;
     return Followers::where('Follower_id', $user->id)->count() ?? false;
       
    }


    public function followers(){
         return $this->belongsToMany(User::class, 'followers', 'Followee_id', 'Follower_id');
     }

     public function following(){
         return $this->belongsToMany(User::class, 'followers', 'Follower_id', 'Followee_id')->withTimestamps();;
     }
}
