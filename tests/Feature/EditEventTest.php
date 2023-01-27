<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditEventTest extends TestCase
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
    public function user_cannot_view_edit_page_when_is_not_authenticated()
    {
        $event = Event::factory()->make();
        $response = $this->get("/listevents/$event->id/edit");
        $response->assertRedirect('/listevents');
    }

    /** @test */
    public function user_cannot_view_edit_page_when_is_not_administrator()
    {
        $user = User::factory()->make();
        $event = Event::factory()->create();
        $response = $this->actingAs($user)->get("/listevents/{$event->id}/edit");
        $response->assertForbidden();
    }

    /** @test */
    public function user_can_view_edit_page_when_is_administrator()
    {
        $user = User::where('email', 'admin@example.com')->first();
        $event = Event::factory()->create();
        $response = $this->actingAs($user)->get("/listevents/{$event->id}/edit");
        $response->assertOk()
            ->assertSee($event->title);
    }

    /** @test */
    public function user_can_edit_event_following_all_rules_without_image_upload()
    {
        $user = User::where('email', 'admin@example.com')->first();
        $event = Event::factory()->create([
            'title' => 'Event to Edit',
        ]);
        $this->actingAs($user)->get("/listevents/{$event->id}/edit");

        $response = $this->put("/listevents/{$event->id}", [
            'title' => 'Edited Event',
            'description' => 'new description',
            'expiration_date' => '2999-12-31T00:00:00',
            'location' => 'Tortosa',
            'max_participants' => '50',
        ]);

        $this->assertDatabaseCount('events', 15);
        $this->assertDatabaseHas('events', [
            'title' => 'Edited Event',
        ]);
        $this->assertDatabaseMissing('events', [
            'title' => 'Event to Edit',
        ]);

        $event = Event::where('title', 'Edited Event')->first();

        $response->assertStatus(302)
        ->assertRedirect("/listevents/{$event->id}")
        ->assertSessionHasNoErrors();

        $this->get("/listevents")->assertOk()
            ->assertSee($event->title, $event->description);
    }
}
