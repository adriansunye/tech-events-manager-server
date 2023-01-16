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
    public function listevents_page_shows_the_events()
    {
        Event::factory()->count(3)->create();

        $events = Event::get();

        $this->get('/listevents')
            ->assertSeeInOrder([
                $events[0]->title,
                $events[1]->title,
                $events[2]->title,
            ]);
    }

    /** @test */
    public function listevents_goes_to_event_view_and_returns_that_event_data()
    {
        Event::factory()->create([
            'title' => 'Taco'
        ]);
        Event::factory()->create([
            'title' => 'Pizza'
        ]);
        $event = Event::factory()->create([
            'title' => 'BBQ'
        ]);

        $this->get('/listevents')->assertSeeInOrder(['Taco', 'Pizza', 'BBQ']);

        $this->get("/listevents/{$event->id}")
            ->assertSee('BBQ')
            ->assertDontSeeText('Pizza')
            ->assertDontSeeText('Taco');
    }
}
