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

    public function Reply(){
        return $this->hasMany(Reply::class);
    }


    protected $fillable=[
       'user_id',
       'posts_id',
       'content'
    ];
}


