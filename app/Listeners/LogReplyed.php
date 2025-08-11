<?php

namespace App\Listeners;

use App\Events\Replyed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogReplyed
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
     * @param  \App\Events\Replyed  $event
     * @return void
     */
    public function handle(Replyed $event)
    {
        //
    }
}
