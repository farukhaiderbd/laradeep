<?php

namespace Tests\Feature;

use App\Events\PodcastProcessed;
use App\Mail\WelcomeContestRegistration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContestRegistractionTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
//        Event::fake();
        Event::fake([
            PodcastProcessed::class
        ]);
    }
    /** @test */
    public function an_email_can_be_entered_into_contest()
    {
        $this->withoutExceptionHandling();

       $this->post('/contest',[
          'email' => 'faruk@gmail.com'
       ]);

       $this->assertDatabaseCount('contest_entries', 1);
    }
    /** @test */
    public function email_is_required()
    {
        $this->post('/contest',[
            'email' => ''
        ]);
        $this->assertDatabaseCount('contest_entries', 0);
    }
    /** @test */
    public function email_is_an_email_address()
    {
        $this->post('/contest',[
            'email' => 'fasfafssdf'
        ]);
        $this->assertDatabaseCount('contest_entries', 0);
    }
    /** @test */
    public function contest_entry_fired_event()
    {
//        $this->withoutExceptionHandling();
        $this->post('/contest',[
            'email' => 'abc@gmail.com'
        ]);

        Event::assertDispatched(PodcastProcessed::class);
    }
    /** @test */
    public function contest_welcome_email_is_sent()
    {
        $this->withoutExceptionHandling();
        $this->post('/contest',[
            'email' => 'abc@gmail.com'
        ]);

       Mail::assertSent(WelcomeContestRegistration::class);
    }
}
