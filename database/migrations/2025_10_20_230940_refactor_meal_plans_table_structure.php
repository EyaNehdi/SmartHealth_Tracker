<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop the existing tables
        Schema::dropIfExists('meal_plan_meal');
        Schema::dropIfExists('meal_plans');

        // Create the simplified meal_plans table
        Schema::create('meal_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('total_days')->comment('Number of days in the meal plan');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Add indexes for optimization
            $table->index('is_active');
            $table->index('created_by');
            $table->index('total_days');
        });

        // Create the simplified pivot table for meal assignments
        Schema::create('meal_plan_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_plan_id')->constrained('meal_plans')->onDelete('cascade');
            $table->foreignId('meal_id')->constrained('meals')->onDelete('cascade');
            $table->integer('day_number')->comment('Day number in the meal plan (1, 2, 3, etc.)');
            $table->enum('meal_time', ['breakfast', 'snack', 'lunch', 'dinner'])->comment('Time of day for the meal');
            $table->timestamps();
            
            // Add indexes for efficient querying
            $table->index(['meal_plan_id', 'day_number']);
            $table->index(['meal_plan_id', 'meal_time']);
            $table->index(['day_number', 'meal_time']);
            
            // Ensure unique combination - one meal per day/time slot
            $table->unique(['meal_plan_id', 'day_number', 'meal_time'], 'unique_meal_plan_day_time');
            
            // Ensure no duplicate meal assignments
            $table->unique(['meal_plan_id', 'meal_id', 'day_number', 'meal_time'], 'unique_meal_assignment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the new tables
        Schema::dropIfExists('meal_plan_assignments');
        Schema::dropIfExists('meal_plans');

        // Recreate the original structure
        Schema::create('meal_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('duration_type', ['daily', 'weekly', 'monthly'])->default('weekly');
            $table->integer('total_days')->default(7)->comment('Number of days in the meal plan');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('duration_type');
            $table->index('is_active');
            $table->index('created_by');
        });

        Schema::create('meal_plan_meal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_plan_id')->constrained('meal_plans')->onDelete('cascade');
            $table->foreignId('meal_id')->constrained('meals')->onDelete('cascade');
            $table->integer('day_number')->comment('Day number in the meal plan (1, 2, 3, etc.)');
            $table->enum('meal_time', ['breakfast', 'snack', 'lunch', 'dinner'])->nullable();
            
            $table->index(['meal_plan_id', 'day_number']);
            $table->index(['meal_plan_id', 'meal_time']);
            $table->index('day_number');
            
            $table->unique(['meal_plan_id', 'meal_id', 'day_number', 'meal_time'], 'unique_meal_plan_day');
        });
    }
};