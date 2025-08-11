<?php

namespace App\Providers;

use App\Events\Commented;
use App\Events\CommentLiked;
use App\Events\Followed;
use App\Events\PostLiked;
use App\Listeners\LogCommented;
use App\Listeners\LogCommentLiked;
use App\Listeners\LogFollowed;
use App\Listeners\LogPostLiked;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        PostLiked::class => [
            LogPostLiked::class
        ],

        CommentLiked::class => [
            LogCommentLiked::class
        ],

        Commented::class => [
            LogCommented::class
        ],

        Followed::class => [
            LogFollowed::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
