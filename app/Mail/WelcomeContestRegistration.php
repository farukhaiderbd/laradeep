<?php

namespace App\Mail;

use App\Models\ContestEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeContestRegistration extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var ContestEntry
     */
    public $contestEntry;

    /**
     * Create a new message instance.
     *
     * @param ContestEntry $contestEntry
     */
    public function __construct(contestEntry $contestEntry)
    {
        //
        $this->contestEntry = $contestEntry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.welcome');
    }
}
