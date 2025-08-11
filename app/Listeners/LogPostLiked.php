<?php

namespace App\Listeners;

use App\Models\Posts;
use App\Models\Activity;
use App\Models\PostLike;
use App\Events\PostLiked;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogPostLiked
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
     * @param  \App\Events\PostLiked  $event
     * @return void
     */
    public function handle(PostLiked $event)
    {
        $event->postOwner->id == $event->actor->id ?:
          Activity::create([
               'user_id'=>$event->postOwner->id,
               'actor_id'=>$event->actor->id,
               'target_id'=>$event->post->user_id,
                'type'=>'post_liked',
                'subject_type'=>Posts::class,
                 'subject_id'=>$event->post->id
          ]);
    }
}
