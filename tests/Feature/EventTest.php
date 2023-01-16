<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
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
    public function item_can_be_added_to_the_cart()
    {
        $this->assertTrue(true);
    }
}
