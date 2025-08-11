<?php

namespace App\Models;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;


    protected $fillable=[
           'user_id',
           'comment_id',
           'body'
    ];

    public function Post(){
        $this->belongsTo(Posts::class);
    }

    public function user(){
       return $this->belongsTo(User::class)->with('Profile');
    }

    public function comment(){
        return $this->belongsTo(Comments::class);
    }
}
