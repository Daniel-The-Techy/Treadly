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
use PhpParser\Node\Stmt\Return_;

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


    public function followBy($followee_id){

      // return $this->following->contains('followee_id', $followee_id);

          return auth()->user()->following()->where('followee_id', $followee_id)->exists();
    }


    public function likedComments()
    {
        return $this->belongsToMany(Comments::class, 'comment_likes')->withTimestamps();
    }
    

     public function profileOwner($user_id, $profile_id) {
           if($user_id == $profile_id){
                return true;
           }

           return false;
     }
     

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

    

    public function Reply(){
        
        return $this->hasMany(Reply::class);
    }

    public function comments(){

        return $this->hasMany(Comments::class);
    }

    public function hasLikePost($user_id) {
        return $this->LikePost->contains('user_id', $user_id);

     }

     public function postViews() {
       return $this->hasMany(post_views::class);
     }


    public function LikePost() {
        return $this->belongsToMany(Posts::class, 'post_likes');
    }
  


    public function followers(){

         return $this->belongsToMany(User::class, 'followers', 'Followee_id', 'Follower_id')->withTimestamps();
     }

     public function following(){

         return $this->belongsToMany(User::class, 'followers', 'Follower_id', 'Followee_id')->withTimestamps();;
     }

     
}
