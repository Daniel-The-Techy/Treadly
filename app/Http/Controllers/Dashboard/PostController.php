<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\PostLiked;
use Exception;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Posts;
use App\Models\Comments;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\CommentController;
use App\Models\post_views;
use App\Models\PostLike;
use App\Service\ViewService as ServiceViewService;
use Facades\App\Service\ViewService;

class PostController extends Controller
{

    public function showCategory(Request $request, Posts $posts){
        $Category=Categories::get();

        return Inertia::render('Posts', [
           'Categorys'=>$Category,
           'post'=>$posts
        ]);
    }
    
    public function store(Request $request){
        $Post=$request->validate([
            'title'=>'required',
            'content'=>'required',
            'status'=>'required',
            'Categories_id'=>'required',
            'Cover_image'=>'required'
        ]);

       if(isset($Post['Cover_image'])){
          $image=$this->saveImage($Post['Cover_image']);
          $Post['Cover_image']=$image;
       }

         //Check if image already exist in the Filesystem 
         $image=$request->user()->Cover_image;

         if($image){
            $absolutePath=public_path($image);
            File::delete($absolutePath);
         }

         //check if category name exist if yes insert its id to the Post table

         $value=$request->input('Categories_id');
         $Category=Categories::where('name', $value)->first();

         // dd($Category->id);


        $request->user()->Posts()->updateOrCreate(
            ['id' => $request->id],
            [
            'title'=>$Post['title'],
            'content'=>$Post['content'],
            'status'=>$Post['status'],
            'Cover_image'=>$Post['Cover_image'],
            'Categories_id'=>$Category->id,
            ],
    
    );

        return back()->with('PostStatus', 'Post Successfully Published');

    }

    public function saveImage($image){

        if(preg_match('/^data:image\/(\w+);base64,/', $image, $match)){

            $image=substr($image, strpos($image, ',') + 1);

            $type=strtolower($match[1]);

            if(!in_array($type, ['jpg', 'png', 'jpeg'])){
                throw new Exception('base encoded failed');
            }
            $image=str_replace(' ', '+', $image);
            $image=base64_decode($image);

            if($image == false){
                throw new Exception('please provide a valid image');
            }


        }else{
            throw new Exception('did not match data URL with image data');
        }

        $dir='images/';
        $file=Str::random(). '.' .$type;
        $absolutePath=public_path($dir);
        $relativePath=$dir . $file;

        if(!File::exists($absolutePath)){
            File::makeDirectory($absolutePath, 0755, true);
        }
        file_put_contents($relativePath, $image);

        return $relativePath;
     }

       public function Like_Post(Request $request, PostLike $post_like, Posts $posts) {
          $post_id=$request->posts_id;
         
          $action=$request->user()->LikePost()->toggle($posts->id);

            //dd($action['attached'][0]);
        if(!empty($action['attached'])){
               event(new PostLiked($request->user(), $posts, $posts->user));
            }
       }

       public function AllPosts(Request $request, Posts $post, ){
          $filter=$request->query('filter');
       // $posts=$post::with(['user', 'user.profile', 'category'])->latest()->paginate(5);  //through
         $posts=$post::withCount(['likes', 'comment', 'views'])->when($filter === 'popular', function ($query) {
               $query->orderByDesc('likes_count');
         })->when($filter === 'engagement', function($query) {
             $query->orderByRaw('(likes_count + comment_count)DESC');
         })->when($filter === 'most_viewed', function($query) {
             $query->orderByDesc('views_count');
         })->when($filter === 'latest', function($query) {
             $query->latest();
         })->when($filter === 'default', function($query){
             $query->get();
         })->with(['user', 'user.profile', 'category'])->latest()->paginate(5);

         
        $topCategory=Categories::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get();
        $topContributor=User::withCount(['posts'])->orderBy('posts_count', 'desc')
        ->with('profile')
        ->take(5)->get()->map(fn($user) => [
              'id'=>$user->id,
              'name'=>$user->name,
              'posts_count'=>$user->posts_count,
              'profile' => [
                'image' => $user->Profile?->Photo
              ]
        ]);
       

       



        return Inertia::render('Account/Posts', [
           'posts'=>$posts,
           'topCategory'=>$topCategory,
           'topContributor'=>$topContributor
        ]);
     }


     public function searchPost(Request $request) {
           $search=$request->input('search');

           $posts=Posts::with(['category', 'user.profile', 'user'])->where('title', 'like', "%{$search}%")
           ->orWhereHas('category', function($query) use ($search) {
               $query->where('name', 'like', "%{$search}%");
           })->orWhereHas('user', function($query) use ($search) {
               $query->where('name', 'like', "%{$search}%");
           })->latest()->paginate(5);

           return Inertia('Account/searchPost', [
             'posts'=>$posts,
           ]);
     }

     public function show(Request $request, $id, $slug, Comments $comment, post_views $post_views){
    
           $postData=Posts::with(['comment.Reply',  'comment.user', 'user.profile'])->find($id);

           $Auth=$request->user()->id ?? false;

           $userPost=Posts::find($id);

           $followers=$userPost->user->followers->count();

           $RelatedPostCategory=$postData->Categories_id;

         $RelatedPost=Posts::query()->where('Categories_id', $RelatedPostCategory)
         ->where('id', '!=', $id)-> limit(4)->get();
        

           $status=$request->user() && $request->user()->followBy($userPost->user->id);

           $likedPostStatus=$request->user() && $userPost->hasLikePost($request->user()->id);

           $postLikeCount=$userPost->Likes->count();

           ViewService::addPostViews($request, $userPost);

           $postViewsCount=ViewService::countPostViews($userPost, $post_views);
    
           $comments=app(CommentController::class)->show($comment, $userPost);
    
          $readingTime=$userPost->reading_time;

          $latestPost=Posts::latest()->take(3)->get();

         // dd($latestPost);
           
        return Inertia::render('Account/Post',  [
           'posts' =>$postData,
           'comments'=>$comments,
            'Auth'=>$Auth,
           'relatedPost'=>$RelatedPost,
            'Followers_Count'=>$followers,
            'status'=>$status,
           'postLikeStatus'=>$likedPostStatus,
            'postLikeCount' =>$postLikeCount,
            'postViewsCount' => $postViewsCount,
            'readingTime' =>$readingTime,
            'latestPost'=>$latestPost
        ]);
     }

      
}
