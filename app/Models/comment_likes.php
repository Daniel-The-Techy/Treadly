<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_likes extends Model
{
    use HasFactory;



    protected $fillable= [
        'comments_id',
        'users_id'
    ];



    public function Comment(){
       return $this->belongsTo(Comments::class);
    }

}
