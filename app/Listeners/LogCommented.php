<?php

namespace App\Listeners;

use App\Models\Posts;
use App\Models\Activity;
use App\Models\Comments;
use App\Events\Commented;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogCommented
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
     * @param  \App\Events\Commented  $event
     * @return void
     */
    public function handle(Commented $event)
    {
         Activity::create([
            'user_id'=>$event->postOwner->id,
            'actor_id'=>$event->actor->id,
            'target_id'=>$event->post->user_id,
            'type'=>'commented',
            'subject_id'=>$event->post->id,
            'subject_type'=>Posts::class
         ]);
    }
}
