<?php

namespace App\Listeners;

use App\Events\Followed;
use App\Models\Activity;
use App\Models\Followers;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogFollowed
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
     * @param  \App\Events\Followed  $event
     * @return void
     */
    public function handle(Followed $event)
    {
        Activity::create([
            'user_id'=>$event->userFollowed->id,
            'actor_id'=>$event->follower->id,
            'target_id'=>$event->followee->id,
            'type'=>'followed',
            'subject_id'=>$event->followee->id,
            'subject_type'=>User::class
        ]);
    }
}
