<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealPlanFactory extends Factory
{
    protected $model = \App\Models\MealPlan::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'total_days' => $this->faker->numberBetween(1, 7),
            'created_by' => User::factory(),
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
        ];
    }
}
