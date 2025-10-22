<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\TypeEvent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        // Crée un type d'événement si aucun n'existe
        $typeEvent = TypeEvent::inRandomOrder()->first() ?? TypeEvent::factory()->create();

        return [
            'title' => $this->faker->words(3, true),
            'location' => $this->faker->city,
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'description' => $this->faker->sentence,
            'type_event_id' => $typeEvent->id,
            'participants' => [],
        ];
    }
}
