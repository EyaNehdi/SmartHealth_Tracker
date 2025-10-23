<?php

namespace Database\Seeders;

use App\Models\MealPlan;
use App\Models\MealPlanAssignment;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MealPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get a user to create meal plans
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
        }

        // Verify we have meals
        $mealCount = Meal::count();
        if ($mealCount === 0) {
            $this->command->error('No meals found! Please run MealSeeder first.');
            return;
        }
        $this->command->info("Found {$mealCount} meals to work with.");

        $mealPlans = [
            // 7-Day Meal Plan
            [
                'name' => 'Balanced Weekly Plan',
                'description' => 'A well-balanced weekly meal plan focusing on protein, healthy carbs, and vegetables',
                'total_days' => 7,
                'is_active' => true,
                'assignments' => [
                    // Day 1
                    ['meal_id' => 1, 'day_number' => 1, 'meal_time' => 'breakfast'],
                    ['meal_id' => 3, 'day_number' => 1, 'meal_time' => 'lunch'],
                    ['meal_id' => 5, 'day_number' => 1, 'meal_time' => 'dinner'],
                    ['meal_id' => 7, 'day_number' => 1, 'meal_time' => 'snack'],
                    
                    // Day 2
                    ['meal_id' => 2, 'day_number' => 2, 'meal_time' => 'breakfast'],
                    ['meal_id' => 4, 'day_number' => 2, 'meal_time' => 'lunch'],
                    ['meal_id' => 6, 'day_number' => 2, 'meal_time' => 'dinner'],
                    ['meal_id' => 8, 'day_number' => 2, 'meal_time' => 'snack'],
                    
                    // Day 3
                    ['meal_id' => 1, 'day_number' => 3, 'meal_time' => 'breakfast'],
                    ['meal_id' => 3, 'day_number' => 3, 'meal_time' => 'lunch'],
                    ['meal_id' => 5, 'day_number' => 3, 'meal_time' => 'dinner'],
                    ['meal_id' => 7, 'day_number' => 3, 'meal_time' => 'snack'],
                    
                    // Day 4
                    ['meal_id' => 2, 'day_number' => 4, 'meal_time' => 'breakfast'],
                    ['meal_id' => 4, 'day_number' => 4, 'meal_time' => 'lunch'],
                    ['meal_id' => 6, 'day_number' => 4, 'meal_time' => 'dinner'],
                    ['meal_id' => 8, 'day_number' => 4, 'meal_time' => 'snack'],
                    
                    // Day 5
                    ['meal_id' => 1, 'day_number' => 5, 'meal_time' => 'breakfast'],
                    ['meal_id' => 3, 'day_number' => 5, 'meal_time' => 'lunch'],
                    ['meal_id' => 5, 'day_number' => 5, 'meal_time' => 'dinner'],
                    ['meal_id' => 7, 'day_number' => 5, 'meal_time' => 'snack'],
                    
                    // Day 6
                    ['meal_id' => 2, 'day_number' => 6, 'meal_time' => 'breakfast'],
                    ['meal_id' => 4, 'day_number' => 6, 'meal_time' => 'lunch'],
                    ['meal_id' => 6, 'day_number' => 6, 'meal_time' => 'dinner'],
                    
                    // Day 7
                    ['meal_id' => 1, 'day_number' => 7, 'meal_time' => 'breakfast'],
                    ['meal_id' => 3, 'day_number' => 7, 'meal_time' => 'lunch'],
                    ['meal_id' => 5, 'day_number' => 7, 'meal_time' => 'dinner'],
                ],
            ],

            // 1-Day Meal Plan
            [
                'name' => 'Quick Daily Plan',
                'description' => 'Simple daily meal plan for busy schedules',
                'total_days' => 1,
                'is_active' => true,
                'assignments' => [
                    ['meal_id' => 1, 'day_number' => 1, 'meal_time' => 'breakfast'],
                    ['meal_id' => 3, 'day_number' => 1, 'meal_time' => 'lunch'],
                    ['meal_id' => 5, 'day_number' => 1, 'meal_time' => 'dinner'],
                ],
            ],

            // 14-Day Meal Plan
            [
                'name' => 'Two-Week Wellness Plan',
                'description' => 'Comprehensive two-week meal plan for health goals',
                'total_days' => 14,
                'is_active' => true,
                'assignments' => [
                    // Day 1
                    ['meal_id' => 1, 'day_number' => 1, 'meal_time' => 'breakfast'],
                    ['meal_id' => 2, 'day_number' => 1, 'meal_time' => 'lunch'],
                    ['meal_id' => 3, 'day_number' => 1, 'meal_time' => 'dinner'],
                    
                    // Day 2
                    ['meal_id' => 2, 'day_number' => 2, 'meal_time' => 'breakfast'],
                    ['meal_id' => 3, 'day_number' => 2, 'meal_time' => 'lunch'],
                    ['meal_id' => 4, 'day_number' => 2, 'meal_time' => 'dinner'],
                    
                    // Day 3
                    ['meal_id' => 3, 'day_number' => 3, 'meal_time' => 'breakfast'],
                    ['meal_id' => 4, 'day_number' => 3, 'meal_time' => 'lunch'],
                    ['meal_id' => 5, 'day_number' => 3, 'meal_time' => 'dinner'],
                    
                    // Day 4
                    ['meal_id' => 4, 'day_number' => 4, 'meal_time' => 'breakfast'],
                    ['meal_id' => 5, 'day_number' => 4, 'meal_time' => 'lunch'],
                    ['meal_id' => 6, 'day_number' => 4, 'meal_time' => 'dinner'],
                    
                    // Day 5
                    ['meal_id' => 5, 'day_number' => 5, 'meal_time' => 'breakfast'],
                    ['meal_id' => 6, 'day_number' => 5, 'meal_time' => 'lunch'],
                    ['meal_id' => 7, 'day_number' => 5, 'meal_time' => 'dinner'],
                    
                    // Day 6
                    ['meal_id' => 6, 'day_number' => 6, 'meal_time' => 'breakfast'],
                    ['meal_id' => 7, 'day_number' => 6, 'meal_time' => 'lunch'],
                    ['meal_id' => 8, 'day_number' => 6, 'meal_time' => 'dinner'],
                    
                    // Day 7
                    ['meal_id' => 7, 'day_number' => 7, 'meal_time' => 'breakfast'],
                    ['meal_id' => 8, 'day_number' => 7, 'meal_time' => 'lunch'],
                    ['meal_id' => 1, 'day_number' => 7, 'meal_time' => 'dinner'],
                    
                    // Day 8-14 (cycling through meals)
                    ['meal_id' => 8, 'day_number' => 8, 'meal_time' => 'breakfast'],
                    ['meal_id' => 1, 'day_number' => 8, 'meal_time' => 'lunch'],
                    ['meal_id' => 2, 'day_number' => 8, 'meal_time' => 'dinner'],
                    
                    ['meal_id' => 1, 'day_number' => 9, 'meal_time' => 'breakfast'],
                    ['meal_id' => 2, 'day_number' => 9, 'meal_time' => 'lunch'],
                    ['meal_id' => 3, 'day_number' => 9, 'meal_time' => 'dinner'],
                    
                    ['meal_id' => 2, 'day_number' => 10, 'meal_time' => 'breakfast'],
                    ['meal_id' => 3, 'day_number' => 10, 'meal_time' => 'lunch'],
                    ['meal_id' => 4, 'day_number' => 10, 'meal_time' => 'dinner'],
                    
                    ['meal_id' => 3, 'day_number' => 11, 'meal_time' => 'breakfast'],
                    ['meal_id' => 4, 'day_number' => 11, 'meal_time' => 'lunch'],
                    ['meal_id' => 5, 'day_number' => 11, 'meal_time' => 'dinner'],
                    
                    ['meal_id' => 4, 'day_number' => 12, 'meal_time' => 'breakfast'],
                    ['meal_id' => 5, 'day_number' => 12, 'meal_time' => 'lunch'],
                    ['meal_id' => 6, 'day_number' => 12, 'meal_time' => 'dinner'],
                    
                    ['meal_id' => 5, 'day_number' => 13, 'meal_time' => 'breakfast'],
                    ['meal_id' => 6, 'day_number' => 13, 'meal_time' => 'lunch'],
                    ['meal_id' => 7, 'day_number' => 13, 'meal_time' => 'dinner'],
                    
                    ['meal_id' => 6, 'day_number' => 14, 'meal_time' => 'breakfast'],
                    ['meal_id' => 7, 'day_number' => 14, 'meal_time' => 'lunch'],
                    ['meal_id' => 8, 'day_number' => 14, 'meal_time' => 'dinner'],
                ],
            ],

            // Vegetarian Plan
            [
                'name' => 'Vegetarian Wellness Plan',
                'description' => 'Plant-based meal plan focusing on vegetarian nutrition',
                'total_days' => 5,
                'is_active' => false, // Inactive plan for demonstration
                'assignments' => [
                    ['meal_id' => 2, 'day_number' => 1, 'meal_time' => 'breakfast'],
                    ['meal_id' => 5, 'day_number' => 1, 'meal_time' => 'lunch'],
                    ['meal_id' => 6, 'day_number' => 1, 'meal_time' => 'dinner'],
                    
                    ['meal_id' => 2, 'day_number' => 2, 'meal_time' => 'breakfast'],
                    ['meal_id' => 5, 'day_number' => 2, 'meal_time' => 'lunch'],
                    ['meal_id' => 6, 'day_number' => 2, 'meal_time' => 'dinner'],
                    
                    ['meal_id' => 3, 'day_number' => 3, 'meal_time' => 'breakfast'],
                    ['meal_id' => 6, 'day_number' => 3, 'meal_time' => 'lunch'],
                    ['meal_id' => 7, 'day_number' => 3, 'meal_time' => 'dinner'],
                    
                    ['meal_id' => 3, 'day_number' => 4, 'meal_time' => 'breakfast'],
                    ['meal_id' => 6, 'day_number' => 4, 'meal_time' => 'lunch'],
                    ['meal_id' => 7, 'day_number' => 4, 'meal_time' => 'dinner'],
                    
                    ['meal_id' => 4, 'day_number' => 5, 'meal_time' => 'breakfast'],
                    ['meal_id' => 7, 'day_number' => 5, 'meal_time' => 'lunch'],
                    ['meal_id' => 8, 'day_number' => 5, 'meal_time' => 'dinner'],
                ],
            ],

            // High Protein Plan
            [
                'name' => 'High Protein Plan',
                'description' => 'Meal plan focused on high protein content for muscle building',
                'total_days' => 3,
                'is_active' => true,
                'assignments' => [
                    // Day 1
                    ['meal_id' => 1, 'day_number' => 1, 'meal_time' => 'breakfast'],
                    ['meal_id' => 1, 'day_number' => 1, 'meal_time' => 'snack'],
                    ['meal_id' => 3, 'day_number' => 1, 'meal_time' => 'lunch'],
                    ['meal_id' => 5, 'day_number' => 1, 'meal_time' => 'dinner'],
                    
                    // Day 2
                    ['meal_id' => 2, 'day_number' => 2, 'meal_time' => 'breakfast'],
                    ['meal_id' => 2, 'day_number' => 2, 'meal_time' => 'snack'],
                    ['meal_id' => 4, 'day_number' => 2, 'meal_time' => 'lunch'],
                    ['meal_id' => 6, 'day_number' => 2, 'meal_time' => 'dinner'],
                    
                    // Day 3
                    ['meal_id' => 3, 'day_number' => 3, 'meal_time' => 'breakfast'],
                    ['meal_id' => 3, 'day_number' => 3, 'meal_time' => 'snack'],
                    ['meal_id' => 5, 'day_number' => 3, 'meal_time' => 'lunch'],
                    ['meal_id' => 7, 'day_number' => 3, 'meal_time' => 'dinner'],
                ],
            ],
        ];

        foreach ($mealPlans as $index => $planData) {
            try {
                $this->command->info("Creating meal plan " . ($index + 1) . ": " . $planData['name']);
                
                $assignments = $planData['assignments'];
                unset($planData['assignments']);

                $planData['created_by'] = $user->id;
                $mealPlan = MealPlan::create($planData);

                // Create meal assignments
                $createdAssignments = 0;
                foreach ($assignments as $assignmentData) {
                    // Verify meal exists
                    $meal = Meal::find($assignmentData['meal_id']);
                    if (!$meal) {
                        $this->command->error("Meal with ID {$assignmentData['meal_id']} not found! Skipping this assignment.");
                        continue;
                    }
                    
                    // Verify day number is within the plan's total days
                    if ($assignmentData['day_number'] > $mealPlan->total_days) {
                        $this->command->error("Day number {$assignmentData['day_number']} exceeds plan's total days ({$mealPlan->total_days}). Skipping this assignment.");
                        continue;
                    }
                    
                    MealPlanAssignment::create([
                        'meal_plan_id' => $mealPlan->id,
                        'meal_id' => $assignmentData['meal_id'],
                        'day_number' => $assignmentData['day_number'],
                        'meal_time' => $assignmentData['meal_time'],
                    ]);
                    $createdAssignments++;
                }
                
                $this->command->info("✓ Meal plan '{$mealPlan->name}' created successfully with {$createdAssignments} meal assignments");
                
            } catch (\Exception $e) {
                $this->command->error("Failed to create meal plan '{$planData['name']}': " . $e->getMessage());
                $this->command->error("Stack trace: " . $e->getTraceAsString());
            }
        }

        $this->command->info("🎉 Meal plan seeding completed! Created " . count($mealPlans) . " meal plans.");
    }
}