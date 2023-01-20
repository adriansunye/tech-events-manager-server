<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $response->assertStatus(200);
    }
}
