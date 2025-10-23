<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FoodItemFactory extends Factory
{
    protected $model = \App\Models\FoodItem::class;

    public function definition()
    {
        $servingTypes = ['g', 'oz', 'slice', 'piece', 'cup', 'tbsp', 'tsp', 'ml'];
        $servingType = $this->faker->randomElement($servingTypes);
        
        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->sentence(),
            'calories' => $this->faker->numberBetween(50, 500),
            'protein' => $this->faker->randomFloat(2, 0, 50),
            'fat' => $this->faker->randomFloat(2, 0, 30),
            'carbs' => $this->faker->randomFloat(2, 0, 100),
            'serving_size' => $this->faker->numberBetween(50, 500),
            'serving_type' => $servingType,
            'image' => 'food_images/' . $this->faker->uuid() . '.jpg',
        ];
    }
}
