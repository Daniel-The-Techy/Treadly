<?php

namespace App\Models;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    use HasFactory;


    protected $fillable=[
        'Username',
        'Bio',
        'About',
        'contact',
        'Photo',
        'skills',
        'Profession',
        'Country',
        'Cover_image',
    ];


    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Followers(){
        return $this->BelongsToMany(Followers::class);
    }

    public function Posts(){
        return $this->belongsTo(Posts::class);
    }
}
