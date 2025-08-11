<?php

namespace App\Listeners;

use App\Models\Posts;
use App\Models\Activity;
use App\Models\Comments;
use App\Events\CommentLiked;
use App\Models\comment_likes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogCommentLiked
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CommentLiked  $event
     * @return void
     */
    public function handle(CommentLiked $event)
    {
        $event->commentOwner->id == $event->actor->id ?:
        Activity::create([
              'user_id'=>$event->commentOwner->id,
              'actor_id'=>$event->actor->id,
              'target_id'=>$event->comment->user_id,
              'type'=>'comment_liked',
                'subject_type'=>Comments::class,
              'subject_id'=>$event->comment->id
          ]);
    }
}
