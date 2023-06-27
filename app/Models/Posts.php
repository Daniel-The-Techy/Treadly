<?php

namespace App\Models;

use App\Models\User;
use App\Models\Profile;
use App\Models\Comments;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Database\Factories\PostsFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory, HasSlug; 


    public function User(){
        return $this->belongsTo(User::class);
    }


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected $fillable=[
        'title',
        'content',
          'slug',
          'status',
          'Cover_image',
          'Categories_id'
    ];

    public function Profile(){
        return $this->hasMany(Profile::class);
    }


    public function Comment(){
        return $this->hasMany(Comments::class);
    }

    protected static function newFactory()
{
    return new PostsFactory();
}
}
