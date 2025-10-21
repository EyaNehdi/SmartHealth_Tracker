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
        Schema::create('meal_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('duration_type', ['daily', 'weekly', 'monthly'])->default('weekly');
            $table->integer('total_days')->default(7)->comment('Number of days in the meal plan');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Add indexes
            $table->index('duration_type');
            $table->index('is_active');
            $table->index('created_by');
        });

        // Create the pivot table for meal_plans and meals
        Schema::create('meal_plan_meal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_plan_id')->constrained('meal_plans')->onDelete('cascade');
            $table->foreignId('meal_id')->constrained('meals')->onDelete('cascade');
            $table->integer('day_number')->comment('Day number in the meal plan (1, 2, 3, etc.)');
            $table->enum('meal_time', ['breakfast', 'snack', 'lunch', 'dinner'])->nullable();
            
            // Add indexes
            $table->index(['meal_plan_id', 'day_number']);
            $table->index(['meal_plan_id', 'meal_time']);
            $table->index('day_number');
            
            // Ensure unique combination
            $table->unique(['meal_plan_id', 'meal_id', 'day_number', 'meal_time'], 'unique_meal_plan_day');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_plan_meal');
        Schema::dropIfExists('meal_plans');
    }
};
