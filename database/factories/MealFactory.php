<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    protected $model = \App\Models\Meal::class;

    public function definition()
    {
        $mealTimes = ['breakfast', 'lunch', 'dinner', 'snack'];
        
        return [
            'created_by' => User::factory(),
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'notes' => $this->faker->optional()->paragraph(),
            'image' => 'meal_images/' . $this->faker->uuid() . '.jpg',
            'meal_time' => $this->faker->randomElement($mealTimes),
            'preparation_time' => $this->faker->numberBetween(5, 120),
            'recipe_description' => $this->faker->optional()->paragraphs(2, true),
            'recipe_attachment' => $this->faker->optional()->url(),
            'tags' => $this->faker->words(3),
            'total_calories' => $this->faker->randomFloat(2, 100, 1000),
            'total_protein' => $this->faker->randomFloat(2, 10, 100),
            'total_fat' => $this->faker->randomFloat(2, 5, 50),
            'total_carbs' => $this->faker->randomFloat(2, 20, 150),
        ];
    }
}
