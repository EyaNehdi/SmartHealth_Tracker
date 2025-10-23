<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\FoodItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get a user to create meals
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
        }

        // Verify we have food items
        $foodItemCount = FoodItem::count();
        if ($foodItemCount === 0) {
            $this->command->error('No food items found! Please run FoodItemSeeder first.');
            return;
        }
        $this->command->info("Found {$foodItemCount} food items to work with.");

        $meals = [
            // Breakfast Meals
            [
                'name' => 'Protein Power Breakfast',
                'description' => 'A high-protein breakfast to start your day with energy',
                'meal_time' => 'breakfast',
                'preparation_time' => 15,
                'recipe_description' => 'Scramble eggs with spinach and serve with Greek yogurt and berries. Perfect for muscle building and sustained energy.',
                'tags' => ['high-protein', 'muscle-building', 'quick'],
                'image' => 'meal_images/Protein Power Breakfast.webp',
                'food_items' => [
                    ['food_id' => 3, 'quantity' => 150, 'unit' => 'g'], // Greek Yogurt
                    ['food_id' => 4, 'quantity' => 2, 'unit' => 'pieces'], // Eggs
                    ['food_id' => 12, 'quantity' => 50, 'unit' => 'g'], // Spinach
                    ['food_id' => 22, 'quantity' => 50, 'unit' => 'g'], // Blueberries
                ],
            ],
            [
                'name' => 'Overnight Oats Delight',
                'description' => 'Creamy overnight oats with fruits and nuts',
                'meal_time' => 'breakfast',
                'preparation_time' => 5,
                'recipe_description' => 'Mix oats with milk, add fruits and nuts. Let sit overnight for a ready-to-eat breakfast.',
                'tags' => ['vegan', 'make-ahead', 'fiber-rich'],
                'image' => 'meal_images/Overnight Oats Delight.jpg',
                'food_items' => [
                    ['food_id' => 9, 'quantity' => 50, 'unit' => 'g'], // Oats
                    ['food_id' => 19, 'quantity' => 200, 'unit' => 'ml'], // Milk
                    ['food_id' => 10, 'quantity' => 1, 'unit' => 'pieces'], // Banana
                    ['food_id' => 17, 'quantity' => 20, 'unit' => 'g'], // Almonds
                ],
            ],

            // Lunch Meals
            [
                'name' => 'Mediterranean Salmon Bowl',
                'description' => 'Nutritious salmon bowl with quinoa and vegetables',
                'meal_time' => 'lunch',
                'preparation_time' => 25,
                'recipe_description' => 'Pan-sear salmon and serve over quinoa with roasted vegetables. Drizzle with olive oil and lemon.',
                'tags' => ['omega-3', 'mediterranean', 'balanced'],
                'image' => 'meal_images/Mediterranean Lunch Bowl.jpg',
                'food_items' => [
                    ['food_id' => 2, 'quantity' => 150, 'unit' => 'g'], // Salmon
                    ['food_id' => 7, 'quantity' => 100, 'unit' => 'g'], // Quinoa
                    ['food_id' => 11, 'quantity' => 75, 'unit' => 'g'], // Broccoli
                    ['food_id' => 15, 'quantity' => 50, 'unit' => 'g'], // Bell Peppers
                    ['food_id' => 16, 'quantity' => 10, 'unit' => 'ml'], // Olive Oil
                ],
            ],
            [
                'name' => 'Chicken & Rice Power Bowl',
                'description' => 'High-protein chicken with brown rice and vegetables',
                'meal_time' => 'lunch',
                'preparation_time' => 30,
                'recipe_description' => 'Grill chicken breast and serve with brown rice and steamed vegetables. Perfect post-workout meal.',
                'tags' => ['high-protein', 'post-workout', 'muscle-building'],
                'image' => 'meal_images/Grilled Chicken Dinner.jpg',
                'food_items' => [
                    ['food_id' => 1, 'quantity' => 200, 'unit' => 'g'], // Chicken Breast
                    ['food_id' => 6, 'quantity' => 150, 'unit' => 'g'], // Brown Rice
                    ['food_id' => 11, 'quantity' => 100, 'unit' => 'g'], // Broccoli
                    ['food_id' => 14, 'quantity' => 75, 'unit' => 'g'], // Carrots
                ],
            ],

            // Dinner Meals
            [
                'name' => 'Vegetarian Buddha Bowl',
                'description' => 'Colorful vegetarian bowl with tofu and vegetables',
                'meal_time' => 'dinner',
                'preparation_time' => 20,
                'recipe_description' => 'Marinate tofu and serve with quinoa, roasted vegetables, and avocado. Drizzle with tahini dressing.',
                'tags' => ['vegetarian', 'vegan', 'colorful', 'nutrient-dense'],
                'image' => 'meal_images/Quinoa Buddha Bowl.jpg',
                'food_items' => [
                    ['food_id' => 5, 'quantity' => 150, 'unit' => 'g'], // Tofu
                    ['food_id' => 7, 'quantity' => 100, 'unit' => 'g'], // Quinoa
                    ['food_id' => 12, 'quantity' => 50, 'unit' => 'g'], // Spinach
                    ['food_id' => 13, 'quantity' => 50, 'unit' => 'g'], // Avocado
                    ['food_id' => 15, 'quantity' => 75, 'unit' => 'g'], // Bell Peppers
                ],
            ],
            [
                'name' => 'Lean Beef Stir Fry',
                'description' => 'Quick and healthy beef stir fry with vegetables',
                'meal_time' => 'dinner',
                'preparation_time' => 15,
                'recipe_description' => 'Stir fry lean beef with mixed vegetables and serve over brown rice. Quick and nutritious dinner option.',
                'tags' => ['quick', 'iron-rich', 'balanced'],
                'image' => 'meal_images/stir-fry-recipe.jpg',
                'food_items' => [
                    ['food_id' => 1, 'quantity' => 150, 'unit' => 'g'], // Chicken Breast (using as lean protein)
                    ['food_id' => 6, 'quantity' => 100, 'unit' => 'g'], // Brown Rice
                    ['food_id' => 11, 'quantity' => 75, 'unit' => 'g'], // Broccoli
                    ['food_id' => 15, 'quantity' => 50, 'unit' => 'g'], // Bell Peppers
                    ['food_id' => 16, 'quantity' => 5, 'unit' => 'ml'], // Olive Oil
                ],
            ],

            // Snack Meals
            [
                'name' => 'Nut & Berry Mix',
                'description' => 'Healthy snack mix with nuts and berries',
                'meal_time' => 'snack',
                'preparation_time' => 5,
                'recipe_description' => 'Mix almonds, walnuts, and berries for a nutritious snack. Perfect for between meals.',
                'tags' => ['snack', 'antioxidants', 'healthy-fats'],
                'image' => 'meal_images/Nut Butter Toast.jpg',
                'food_items' => [
                    ['food_id' => 17, 'quantity' => 30, 'unit' => 'g'], // Almonds
                    ['food_id' => 18, 'quantity' => 20, 'unit' => 'g'], // Walnuts
                    ['food_id' => 22, 'quantity' => 50, 'unit' => 'g'], // Blueberries
                    ['food_id' => 23, 'quantity' => 50, 'unit' => 'g'], // Strawberries
                ],
            ],
            [
                'name' => 'Apple & Cheese Plate',
                'description' => 'Simple and satisfying apple with cheese',
                'meal_time' => 'snack',
                'preparation_time' => 2,
                'recipe_description' => 'Slice apple and serve with cheddar cheese. Classic combination for a quick snack.',
                'tags' => ['simple', 'calcium', 'fiber'],
                'image' => 'meal_images/green Smoothie Bowl.jpeg',
                'food_items' => [
                    ['food_id' => 21, 'quantity' => 1, 'unit' => 'pieces'], // Apple
                    ['food_id' => 20, 'quantity' => 30, 'unit' => 'g'], // Cheddar Cheese
                ],
            ],

            // Special Diet Meals
            [
                'name' => 'Keto Avocado Bowl',
                'description' => 'Low-carb avocado bowl perfect for keto diet',
                'meal_time' => 'lunch',
                'preparation_time' => 10,
                'recipe_description' => 'Halve avocado and fill with tuna, cheese, and nuts. Perfect keto-friendly meal.',
                'tags' => ['keto', 'low-carb', 'healthy-fats'],
                'image' => 'meal_images/Salmon Power Bowl.jpg',
                'food_items' => [
                    ['food_id' => 13, 'quantity' => 100, 'unit' => 'g'], // Avocado
                    ['food_id' => 20, 'quantity' => 40, 'unit' => 'g'], // Cheddar Cheese
                    ['food_id' => 17, 'quantity' => 25, 'unit' => 'g'], // Almonds
                ],
            ],
            [
                'name' => 'Gluten-Free Power Bowl',
                'description' => 'Gluten-free bowl with quinoa and vegetables',
                'meal_time' => 'dinner',
                'preparation_time' => 25,
                'recipe_description' => 'Quinoa-based bowl with vegetables and lean protein. Naturally gluten-free and nutritious.',
                'tags' => ['gluten-free', 'nutrient-dense', 'balanced'],
                'image' => 'meal_images/Egg Scramble Deluxe.jpg',
                'food_items' => [
                    ['food_id' => 7, 'quantity' => 120, 'unit' => 'g'], // Quinoa
                    ['food_id' => 1, 'quantity' => 100, 'unit' => 'g'], // Chicken Breast
                    ['food_id' => 11, 'quantity' => 80, 'unit' => 'g'], // Broccoli
                    ['food_id' => 12, 'quantity' => 40, 'unit' => 'g'], // Spinach
                ],
            ],
        ];

        foreach ($meals as $index => $mealData) {
            try {
                $this->command->info("Creating meal " . ($index + 1) . ": " . $mealData['name']);
                
                $foodItems = $mealData['food_items'];
                unset($mealData['food_items']);

                $mealData['created_by'] = $user->id;
                $meal = Meal::create($mealData);

                // Attach food items to the meal
                foreach ($foodItems as $item) {
                    // Verify food item exists
                    $foodItem = FoodItem::find($item['food_id']);
                    if (!$foodItem) {
                        $this->command->error("Food item with ID {$item['food_id']} not found! Skipping this item.");
                        continue;
                    }
                    
                    $meal->foodItems()->attach($item['food_id'], [
                        'quantity' => $item['quantity'],
                        'unit' => $item['unit'],
                    ]);
                }

                // Update nutritional totals
                $meal->updateNutritionalTotals();
                $this->command->info("✓ Meal '{$meal->name}' created successfully with {$meal->foodItems()->count()} food items");
                
            } catch (\Exception $e) {
                $this->command->error("Failed to create meal '{$mealData['name']}': " . $e->getMessage());
                $this->command->error("Stack trace: " . $e->getTraceAsString());
            }
        }
    }
}