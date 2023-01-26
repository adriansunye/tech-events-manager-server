<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListEventsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function listevents_page_is_accessible()
    {
        $this->get('/listevents')
            ->assertOk();
    }

    /** @test */
    public function listevents_page_has_all_the_required_page_data()
    {
        // Arrange phase
        Event::factory()->count(3)->create();
        // Act
        $response = $this->get('/listevents');

        // Assert
        $events = Event::get();

        $response->assertViewIs('events.index')->assertViewHas('events', $events);
    }

    /** @test */
    public function  listevents_page_shows_the_events_in_descending_order_by_expiration_date()
    {
        Event::factory()->create([
            'expiration_date' => '2999-01-01'
        ]);
        Event::factory()->create([
            'expiration_date' => '2222-01-01'
        ]);
        Event::factory()->create([
            'expiration_date' => '2555-01-01'
        ]);

        $this->get('/listevents')->assertSeeInOrder(['2222', '2555', '2999']);
    }

    /** @test */
    public function  listevents_page_shows_esdeveniment_passat_when_date_is_prior_to_today()
    {
        Event::factory()->create([
            'expiration_date' => '1999-01-01'
        ]);

        $this->get('/listevents')->assertSeeInOrder(['Esdeveniment passat']);
    }

    /** @test */
    public function  listevents_page_shows_remaining_places_of_event()
    {
        Event::factory()->create([
            'max_participants' => '100',
            'participants' => '20'
        ]);

        $this->get('/listevents')->assertSeeInOrder(['80 places lliures']);
    }

    /** @test */
    public function  listevents_page_shows_sense_places_when_paticipants_equals_max()
    {
        Event::factory()->create([
            'max_participants' => '100',
            'participants' => '100'
        ]);

        $this->get('/listevents')->assertSeeInOrder(['Sense places']);
    }
    
    /** @test */
    public function listevents_page_goes_to_events_show_and_shows_the_wanted_event_data()
    {
        Event::factory()->create([
            'title' => 'Masterclass'
        ]);
        Event::factory()->create([
            'title' => 'CodeWomen'
        ]);
        $event = Event::factory()->create([
            'title' => 'Visita BASETIS'
        ]);

        $this->get('/listevents')->assertSeeInOrder(['Masterclass', 'CodeWomen', 'Visita BASETIS']);

        $this->get("/listevents/{$event->id}")
            ->assertSee('Visita BASETIS')
            ->assertDontSeeText('Masterclass')
            ->assertDontSeeText('CodeWomen');
    }
}
