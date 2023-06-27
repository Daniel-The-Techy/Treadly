<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     public function store(Request $request){
            $comment=$request->validate([
               'content'=>'required|min:12',
            ]);

  //     dd($request->input('posts_id'));
          Comments::create([
            'posts_id'=>$request->input('posts_id'),
            'user_id'=>$request->user()->id,
            'content'=>$comment['content']
          ]);


     }

       public function replyComment(){
            
       }
}
