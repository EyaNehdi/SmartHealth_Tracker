<?php

namespace Database\Factories;

use App\Models\TypeEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeEventFactory extends Factory
{
    protected $model = TypeEvent::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
        ];
    }
}
