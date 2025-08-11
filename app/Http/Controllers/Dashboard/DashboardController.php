<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Posts;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\comment_likes;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    

    public function index(User $Users, Request $request){


        $Analytics=User::withCount([ 'Posts', 'followers', 'LikePost', 'postViews'])->find(Auth::id());
        $posts=Posts::withCount(['likes', 'views', 'Comment'])->orderByDesc('views_count')->take(5)->get()->map(function ($post){
              return [
                   'post_id'=>$post->id,
                  'postTitle'=>$post->title,
                  'post_view_count'=>$post->views_count,
                  'post_likes_count'=>$post->likes_count,
                  'post_comment_count'=>$post->comment_count
              ];
        });

        return Inertia::render('Dashboard', [
            'analytics'=>$Analytics,
            'posts'=>$posts
        ]);
    }

    public function miniAnalytics(Request $request){
            $user=$request->user();
      
       $AnalyticsData=User::withCount(['posts', 'postViews', 'followers', 'LikePost'])->find(Auth::id());
        $topPosts=Posts::withCount(['likes', 'views', 'Comment'])->orderByDesc('views_count')->take(5)->get()->map(function ($post){
              return [
                  'postTitle'=>$post->title,
                  'post_view_count'=>$post->views_count,
                  'post_likes_count'=>$post->likes_count,
                  'post_comment_count'=>$post->comment_count
              ];
        });
        $activities=Activity::with(['actor', 'subject'])->where('user_id', '=', Auth::id())
          ->latest()->take(10)->get()->map(function($activity) {
               return [
                    'type'=>$activity->type,
                   'actor_name'=>$activity->actor->name,
                  'subject_post_title'=>$activity->subject_type == Comments::class ? $activity->subject->content : $activity->subject->title,
                   'time'=> $activity->created_at->diffForHumans()
               ];
        });



        // subject, actor, 
        

        return Inertia::render('Analytics', [
            'AnalyticsData'=>$AnalyticsData,
            'topPosts'=>$topPosts,
            'activities'=>$activities,

           // 'Likes'=>$request->user()->Likes->Count(),
        ]);
    }
}