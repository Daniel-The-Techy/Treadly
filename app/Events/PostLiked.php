<?php

namespace App\Events;

use App\Models\User;
use App\Models\Posts;
use App\Models\PostLike;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostLiked
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

      public $actor;
      public $post;

      public $postOwner;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $actor, Posts $post, User $postOwner)
    {
        $this->actor=$actor;
        $this->post=$post;
        $this->postOwner=$postOwner;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
