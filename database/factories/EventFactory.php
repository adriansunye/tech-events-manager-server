<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'Event',
            'description' => 'description',
            'expiration_date' => '2023-12-31',
            'expiration_time' => '00:00:00',
            'location' => 'Barcelona',
            'max_participants' => '100',
        ];
    }
}
