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
        // Create the meal_plans table (consolidated from refactor)
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

        // Create the meal_plan_assignments table (consolidated from refactor)
        Schema::create('meal_plan_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_plan_id')->constrained('meal_plans')->onDelete('cascade');
            $table->foreignId('meal_id')->constrained('meals')->onDelete('cascade');
            $table->integer('day_number')->comment('Day number in the meal plan (1, 2, 3, etc.)');
            $table->enum('meal_time', config('meal_times.values'))->comment('Time of day for the meal');
            $table->timestamps();
            
            // Add indexes for efficient querying
            $table->index(['meal_plan_id', 'day_number']);
            $table->index(['meal_plan_id', 'meal_time']);
            $table->index(['day_number', 'meal_time']);
            
            // Ensure unique combination - one meal per day/time slot
            $table->unique(['meal_plan_id', 'day_number', 'meal_time'], 'unique_meal_plan_day_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_plan_assignments');
        Schema::dropIfExists('meal_plans');
    }
};
