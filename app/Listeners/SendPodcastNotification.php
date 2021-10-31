<?php

namespace App\Listeners;

use App\Events\PodcastProcessed;
use App\Mail\WelcomeContestRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPodcastNotification
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
     * @param  PodcastProcessed  $event
     * @return void
     */
    public function handle(PodcastProcessed $event)
    {

        Mail::to($event->contestEntry->email)
            ->send(new WelcomeContestRegistration($event->contestEntry));
    }
}
