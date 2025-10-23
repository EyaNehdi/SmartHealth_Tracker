<?php

namespace Database\Factories;

use App\Models\Meal;
use App\Models\MealPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealPlanAssignmentFactory extends Factory
{
    protected $model = \App\Models\MealPlanAssignment::class;

    public function definition()
    {
        $mealTimes = ['breakfast', 'lunch', 'dinner', 'snack'];
        
        return [
            'meal_plan_id' => MealPlan::factory(),
            'meal_id' => Meal::factory(),
            'day_number' => $this->faker->numberBetween(1, 7),
            'meal_time' => $this->faker->randomElement($mealTimes),
        ];
    }
}
