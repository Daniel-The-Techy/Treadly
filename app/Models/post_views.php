<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_views extends Model
{
    use HasFactory;


    protected $fillable=[
        'posts_id',
        'user_id',
        'ip_address',
    ];

    public function post(){
        return $this->belongsTo(post_views::class);
    }

    public function user(){
        return $this->belongsTo(post_views::class);
    }
}
