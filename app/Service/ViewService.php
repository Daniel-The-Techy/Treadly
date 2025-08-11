<?php

namespace App\Service;

use App\Models\post_views;
use Illuminate\Http\Request;

  class ViewService{
    public function addPostViews( $request,  $posts) {
        $user_id=$request->user() ? $request->user()->id : null;
        $ip=$request->ip();

         

          post_views::firstOrCreate([
             'posts_id' => $posts->id,
             'user_id'=>$user_id,
             'ip_address' => $user_id ? null : $ip
          ]);
         
    }


    public function countPostViews($post,  $post_views){
     // dd($post);
        return $post_views->where('posts_id', $post->id)->count();
    }
     
  }
















?>