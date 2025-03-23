<?php

namespace App\Listeners\User;

use App\Events\User\StoredUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreProfileListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StoredUserEvent $event): void
    {
        $event->user->profile()->create();
    }
}
