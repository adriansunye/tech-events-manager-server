<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RegisterTest extends TestCase
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
    public function user_can_view_a_register_form()
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    /** @test */
    public function user_cannot_view_a_register_form_when_authenticated()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/register');
        $response->assertRedirect('/');
    }

    /** @test */
    public function user_can_register_with_inputs_following_all_rules()
    {
        $response = $this->post('/register', [
            'name' => 'newUser',
            'email' => 'newUser@email.com',
            'password' => 'i-love-react',
            'password_confirmation' => 'i-love-react'
        ]);

        $response->assertRedirect('/listevents');
        $this->assertAuthenticatedAs(Auth::user());
    }

    /** @test */
    public function user_cannot_register_with_email_that_already_exists()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);


        $response = $this->post('/register', [
            'name' => 'newUser',
            'email' => 'user@example.com',
            'password' => 'i-love-react',
            'password_confirmation' => 'i-love-react'
        ]);

        $response->assertStatus(302);

        $response->assertRedirect('/register');
        $response->assertLocation('/register');

        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_register_without_following_input_rules()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);


        $response = $this->post('/register', [
            'name' => 'usr',
            'email' => 'user@example.com',
            'password' => 'React',
            'password_confirmation' => 'React'
        ]);

        $response->assertStatus(302);

        $response->assertRedirect('/register');
        $response->assertLocation('/register');

        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_register_if_password_confirmation_does_not_match()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);

        $response = $this->post('/register', [
            'name' => 'user',
            'email' => 'newUser@example.com',
            'password' => 'i-love-Laravel',
            'password_confirmation' => 'i-love-React'
        ]);

        $response->assertStatus(302);

        $response->assertRedirect('/register');
        $response->assertLocation('/register');

        $this->assertGuest();
    }
}
