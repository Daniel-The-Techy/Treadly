<?php

namespace App\Events;

use App\Models\Comments;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentLiked
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

       public $actor;
       public $comment;

       public $commentOwner;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Comments $comments, User $commentOwner)
    { 
        $this->actor=$user;
        $this->comment=$comments;
        $this->commentOwner=$commentOwner;
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
