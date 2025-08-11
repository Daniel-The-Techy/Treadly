<?php

namespace App\Http\Controllers;

use App\Events\Commented;
use App\Events\CommentLiked;
use App\Models\comment_likes;
use Inertia\Inertia;
use App\Models\Posts;
use App\Models\Reply;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Egulias\EmailValidator\Parser\Comment;

class CommentController extends Controller
{
     public function store(Request $request, Posts $posts){
            $comment=$request->validate([
               'content'=>'required|min:12',
            ]);

         $user=$request->user();

          $comment=Comments::create([
            'posts_id'=>$posts->id,
            'user_id'=>$user->id,
            'content'=>$comment['content']
          ]);

         event(new Commented($request->user(), $posts, $posts->user));

         // return to_route('Post.show', 45);


     }


        public function show(Comments $comments, Posts $post) {
          //   $comment_likes=$comments->hasLikeComment(Auth::user()->id);
           //  dd($comment_likes);_like
            //  $user=$comments->user->has_like(Auth::user()->id);
             $commentes=$post->Comment()->with(['user', 'reply'])->get()->map(
                function($comment)  {
                  $user_id=Auth::user() ? Auth::user()->id : null;
                  $userHasLiked=$comment->likedByUsers()->where('user_id', $user_id)->exists();
                  $like_Count=$comment->likedByUsers()->where('user_id', $user_id)->count();
                    return[
                      'id'=> $comment->id,
                      'has_Like'=> $userHasLiked,
                      'like_Count'=>$like_Count,
                      'content'=> $comment->content,
                      'visibility'=>$comment->visibility,
                      'reply'=>$comment->reply->map(function ($reply) {
                           return [
                               'id'=>$reply->id,
                               'body'=>$reply->body,
                               'visibility'=>$reply->visibility,
                               'user_id'=>$reply->user_id,
                             'user' => $reply->user->Profile->only('user_id', 'Username', 'Cover_image'),
                            'can'=> [
                              'update' =>Auth::user()  && Auth::user()->can('update', $reply),
                             'delete' => Auth::user() && Auth::user()->can('delete', $reply),
                              'report'  =>Auth::user() && Auth::user()->can('report', $reply)
                             ]
                           ];
                      }),
                      'user' => $comment->user->Profile->only('user_id', 'Username', 'Cover_image'),
                   'can' => [
                    'update' =>Auth::user() && Auth::user()->can('update', $comment),
                    'delete' =>Auth::user()  && Auth::user()->can('delete', $comment),
                    'report'  =>Auth::user() && Auth::user()->can('report', $comment)
                      
                ],
                    ];
                });
                
                return $commentes;


        }

       public function replyComment(Request $request){
        $comments_id=$request->post('comments_id');

         $Reply=$request->validate([
             'content'=>'required|min:12',
         ]);

         $user=$request->user();
        
         Reply::create([
          'user_id'=>$user->id,
          'comment_id'=>$comments_id,
          'body'=>$Reply['content']
         ]);

        }

          public function editComment(Request $request, Comments $comments){

              $request->validate([
                'content'=>'required'
              ]);
                  $this->authorize('update', $comments);

                $content=$request->input('content');

                $commentUpdate=comments::find($comments->id);

                 $commentUpdate->content=$content;

                 $commentUpdate->save();


          }

            public function removeComment(Request $request, Posts $posts, Comments $comments){
            //  if($comments->user_id === $request->user()->id || $posts->user_id === $request->user()->id){
          //  return  $request->user()->Posts()->Comment()->where('id', $comment_id)->delete();
             $this->authorize('delete', $comments);
                        Comments::where('id', $comments->id)->delete();
                   //   }else{
                     //      abort(401, 'unAuthorized Process');
                   //   }

            }

            public function removeReply(Request $request, Reply $reply){
                if($reply->user_id === $request->user()->id){
                  Reply::where('id', $reply->id)->delete();
                }else{
                  abort(401, 'unAuthorized Access');
                }
            }


            public function likeComment(Request $request, Comments $comments, comment_likes $comment_likes) {
              
                  $action=$request->user()->likedComments()->toggle($comments->id);
                if($action['attached']){
                  event(new CommentLiked($request->user(), $comments, $comments->user));
                }
        
}

}