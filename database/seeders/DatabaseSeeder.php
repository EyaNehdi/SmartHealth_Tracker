<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🌱 Starting database seeding...');
        
        // Create test user first
        $this->command->info('👤 Creating test user...');
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->command->info('✓ Test user created');

        // Seed in proper order with dependencies
        $this->command->info('🍎 Seeding food items...');
        $this->call(FoodItemSeeder::class);
        
        $this->command->info('🍽️ Seeding meals...');
        $this->call(MealSeeder::class);
        
        $this->command->info('📅 Seeding meal plans...');
        $this->call(MealPlanSeeder::class);
        
        $this->command->info('✅ Database seeding completed successfully!');
    }
}
