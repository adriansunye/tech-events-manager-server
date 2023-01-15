<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListEventsTest extends TestCase
{
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
}
