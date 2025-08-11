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
    protected $appends=['reading_time'];
    use HasFactory, HasSlug; 


    public function User(){
        return $this->belongsTo(User::class)->with('Profile');
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

    public function getReadingTimeAttribute() {
        $words=str_word_count(strip_tags($this->content));

        $minutes=ceil($words / 200);

        return $minutes;
    }

    public function Profile(){
        return $this->hasMany(Profile::class);
    }

    public function hasLikePost($user_id) {
        return $this->Likes->contains($user_id);
    }

    public function views(){
        return $this->hasMany(post_views::class);
    }


    public function Likes(){
         return $this->belongsToMany(User::class, 'post_likes');
    }


 

    public function canEditComment($user, $post){
     //   return $this->Comment->contains('user_id', $user->id);
         return $user->id === $post->user_id;
    }

    public function canEditReply($user){
     //   return $this->Reply->contains('user_id', $user->id);
      return $user->id ? true : false;
    }


    public function Comment(){
        return $this->hasMany(Comments::class);
    }

    public function Reply(){
        return $this->hasManyThrough(Reply::class, Comments::class);
    }

    public function category() {
        return $this->belongsTo(Categories::class, 'Categories_id');
    }
 

    protected static function newFactory()
{
    return new PostsFactory();
}
}
