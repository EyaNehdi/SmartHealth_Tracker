<?php

namespace Database\Factories;

use App\Models\Challenge;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChallengeFactory extends Factory
{
    protected $model = Challenge::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'dateDebut' => now()->addDay(),
            'dateFin' => now()->addDays(2),
            'created_by' => User::factory(),
            'image' => null,
            'is_famous' => false,
        ];
    }
}
