<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreateEventTest extends TestCase
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
    public function user_cannot_view_create_page_when_is_not_authenticated()
    {
        $response = $this->get('/listevents/create');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function user_cannot_view_create_page_when_is_not_administrator()
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/listevents/create');
        $response->assertForbidden();
    }

    /** @test */
    public function user_can_view_create_page_when_is_administrator()
    {
        $user = User::where('email', 'admin@example.com')->first();
        $response = $this->actingAs($user)->get('/listevents/create');
        $response->assertOk();
    }

    /** @test */
    public function user_can_create_event_following_all_rules_with_image_upload()
    {
        $user = User::where('email', 'admin@example.com')->first();
        $this->actingAs($user)->get('/listevents/create');

        Storage::fake('images');
        $file = UploadedFile::fake()->image('event.jpg');

        $response = $this->post('/listevents', [
            'title' => 'New Event',
            'description' => 'description',
            'expiration_date' => '2500-12-31',
            'expiration_time' => '00:00:00',
            'location' => 'Barcelona',
            'max_participants' => '100',
            'image_path' => $file,
        ]);

        $this->assertDatabaseCount('events', 15);
        $this->assertDatabaseHas('events', [
            'title' => 'New Event',
            'description' => 'description',
            'expiration_date' => '2500-12-31T00:00:00',
            'location' => 'Barcelona',
            'max_participants' => '100',
        ]);
        $this->assertDatabaseMissing('events', [
            'title' => 'Missing Event',
        ]);

        $event = Event::where('title', 'New Event')->first();
        $this->assertFileExists(public_path('storage/images/events/' . $event->image_path));

        $response->assertStatus(302)
            ->assertRedirect('/listevents')
            ->assertSessionHasNoErrors();

        $this->get("/listevents")->assertOk()
            ->assertSee($event->image_path, $event->title);
    }

    /** @test */
    public function user_can_create_event_following_all_rules_without_image_upload()
    {
        $user = User::where('email', 'admin@example.com')->first();
        $this->actingAs($user)->get('/listevents/create');

        $response = $this->post('/listevents', [
            'title' => 'New Event',
            'description' => 'description',
            'expiration_date' => '2500-12-31T00:00:00',
            'location' => 'Barcelona',
            'max_participants' => '100',
        ]);

        $event = Event::where('title', 'New Event')->first();

        $response->assertStatus(302)
            ->assertRedirect('/listevents')
            ->assertSessionHasNoErrors();

        $this->get("/listevents")->assertOk()
            ->assertSee('placeholder.jpg', $event->title);
    }

    /** @test */
    public function user_cannot_create_event_without_following_all_rules()
    {
        $user = User::where('email', 'admin@example.com')->first();
        $this->actingAs($user)->get('/listevents/create');

        $response = $this->post('/listevents', [
            'title' => 'Evn',
        ]);

        $response->assertStatus(302)
            ->assertRedirect('/listevents/create')
            ->assertSessionHasErrors(['title', 'description', 'expiration_date', 'location', 'max_participants']);;
    }

    /** @test */
    public function user_cannot_create_event_with_an_image_exceeding_max_size()
    {
        $user = User::where('email', 'admin@example.com')->first();
        $this->actingAs($user)->get('/listevents/create');

        Storage::fake('images');
        $file = UploadedFile::fake()->image('event.jpg')->size(3072);

        $response = $this->post('/listevents', [
            'image_path' => $file,
        ]);

        $response->assertStatus(302)
            ->assertRedirect('/listevents/create')
            ->assertSessionHasErrors(['image_path']);;
    }
}
