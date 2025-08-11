<?php

namespace App\Models;

use App\Models\Posts;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasFactory;

    public function Posts(){
        return $this->belongsTo(Posts::class);
    }

    public function  user(){
       return $this->belongsTo(User::class)->with('Profile');
     // return $this->belongsTo(User::class, 'user_id');
    }

   
    public function Reply(){
        return $this->hasMany(Reply::class, 'comment_id')->with('user');
    }

    

    public function likedByUsers() {
        return $this->belongsToMany(User::class, 'comment_likes')->withTimestamps();
    }


    protected $fillable=[
       'user_id',
       'posts_id',
       'content'
    ];
}


