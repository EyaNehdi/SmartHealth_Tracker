<?php

namespace Database\Seeders;

use App\Models\FoodItem;
use Illuminate\Database\Seeder;

class FoodItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foodItems = [
            // Proteins
            [
                'name' => 'Chicken Breast',
                'description' => 'Lean chicken breast, skinless and boneless',
                'calories' => 165,
                'protein' => 31.0,
                'fat' => 3.6,
                'carbs' => 0.0,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Chicken_Breast.png',
            ],
            [
                'name' => 'Salmon Fillet',
                'description' => 'Fresh Atlantic salmon fillet',
                'calories' => 208,
                'protein' => 25.4,
                'fat' => 12.4,
                'carbs' => 0.0,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Salmon_Fillet.jpg',
            ],
            [
                'name' => 'Greek Yogurt',
                'description' => 'Plain Greek yogurt, non-fat',
                'calories' => 59,
                'protein' => 10.3,
                'fat' => 0.4,
                'carbs' => 3.6,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Greek_Yogurt.jpg',
            ],
            [
                'name' => 'Eggs',
                'description' => 'Large chicken eggs',
                'calories' => 155,
                'protein' => 13.0,
                'fat' => 11.0,
                'carbs' => 1.1,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Eggs.png',
            ],
            [
                'name' => 'Tofu',
                'description' => 'Firm tofu, organic',
                'calories' => 76,
                'protein' => 8.1,
                'fat' => 4.8,
                'carbs' => 1.9,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Chia Seeds.webp', // Using chia seeds as tofu substitute
            ],

            // Carbohydrates
            [
                'name' => 'Brown Rice',
                'description' => 'Cooked brown rice',
                'calories' => 111,
                'protein' => 2.6,
                'fat' => 0.9,
                'carbs' => 23.0,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Brown_Rice.jpg',
            ],
            [
                'name' => 'Quinoa',
                'description' => 'Cooked quinoa',
                'calories' => 120,
                'protein' => 4.4,
                'fat' => 1.9,
                'carbs' => 22.0,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Quinoa.avif',
            ],
            [
                'name' => 'Sweet Potato',
                'description' => 'Baked sweet potato',
                'calories' => 86,
                'protein' => 1.6,
                'fat' => 0.1,
                'carbs' => 20.1,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Sweet_Potato.png',
            ],
            [
                'name' => 'Oats',
                'description' => 'Rolled oats, dry',
                'calories' => 389,
                'protein' => 16.9,
                'fat' => 6.9,
                'carbs' => 66.3,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Oatmeal.jpg',
            ],
            [
                'name' => 'Banana',
                'description' => 'Medium ripe banana',
                'calories' => 89,
                'protein' => 1.1,
                'fat' => 0.3,
                'carbs' => 22.8,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Banana.avif',
            ],

            // Vegetables
            [
                'name' => 'Broccoli',
                'description' => 'Fresh broccoli florets',
                'calories' => 34,
                'protein' => 2.8,
                'fat' => 0.4,
                'carbs' => 6.6,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Broccoli.jpg',
            ],
            [
                'name' => 'Spinach',
                'description' => 'Fresh spinach leaves',
                'calories' => 23,
                'protein' => 2.9,
                'fat' => 0.4,
                'carbs' => 3.6,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Spinach.webp',
            ],
            [
                'name' => 'Avocado',
                'description' => 'Fresh avocado',
                'calories' => 160,
                'protein' => 2.0,
                'fat' => 14.7,
                'carbs' => 8.5,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Avocado.avif',
            ],
            [
                'name' => 'Carrots',
                'description' => 'Fresh carrots',
                'calories' => 41,
                'protein' => 0.9,
                'fat' => 0.2,
                'carbs' => 9.6,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Coconut Oil.jpg', // Using coconut oil as carrot substitute
            ],
            [
                'name' => 'Bell Peppers',
                'description' => 'Red bell peppers',
                'calories' => 31,
                'protein' => 1.0,
                'fat' => 0.3,
                'carbs' => 7.3,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/almond_milk.webp', // Using almond milk as bell pepper substitute
            ],

            // Fats & Oils
            [
                'name' => 'Olive Oil',
                'description' => 'Extra virgin olive oil',
                'calories' => 884,
                'protein' => 0.0,
                'fat' => 100.0,
                'carbs' => 0.0,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Coconut Oil.jpg',
            ],
            [
                'name' => 'Almonds',
                'description' => 'Raw almonds',
                'calories' => 579,
                'protein' => 21.2,
                'fat' => 49.9,
                'carbs' => 21.6,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/almonds.jpg',
            ],
            [
                'name' => 'Walnuts',
                'description' => 'Raw walnuts',
                'calories' => 654,
                'protein' => 15.2,
                'fat' => 65.2,
                'carbs' => 13.7,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/almonds.jpg', // Using almonds as walnut substitute
            ],

            // Dairy
            [
                'name' => 'Milk',
                'description' => 'Whole milk',
                'calories' => 61,
                'protein' => 3.2,
                'fat' => 3.3,
                'carbs' => 4.8,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/almond_milk.webp',
            ],
            [
                'name' => 'Cheddar Cheese',
                'description' => 'Aged cheddar cheese',
                'calories' => 403,
                'protein' => 25.0,
                'fat' => 33.1,
                'carbs' => 1.3,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Greek_Yogurt.jpg', // Using Greek yogurt as cheese substitute
            ],

            // Fruits
            [
                'name' => 'Apple',
                'description' => 'Medium red apple',
                'calories' => 52,
                'protein' => 0.3,
                'fat' => 0.2,
                'carbs' => 13.8,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/apple.jpg',
            ],
            [
                'name' => 'Blueberries',
                'description' => 'Fresh blueberries',
                'calories' => 57,
                'protein' => 0.7,
                'fat' => 0.3,
                'carbs' => 14.5,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Blueberries.jpg',
            ],
            [
                'name' => 'Strawberries',
                'description' => 'Fresh strawberries',
                'calories' => 32,
                'protein' => 0.7,
                'fat' => 0.3,
                'carbs' => 7.7,
                'serving_size' => 100,
                'serving_type' => 'g',
                'image' => 'food_images/Blueberries.jpg', // Using blueberries as strawberry substitute
            ],
        ];

        foreach ($foodItems as $item) {
            FoodItem::create($item);
        }
    }
}