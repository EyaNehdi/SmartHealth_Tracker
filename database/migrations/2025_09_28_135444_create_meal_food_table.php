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
        Schema::create('food_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('calories');        // calories per serving
            $table->float('protein');     // grams of protein per serving
            $table->float('fat');         // grams of fat per serving
            $table->float('carbs');       // grams of carbohydrates per serving
            $table->string('serving_size')->nullable(); // e.g., "100g", "1 cup"
            $table->timestamps();
        });

        // 2. Migration for Meal Table
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // if user-specific meals
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('meal_date');  // date of the meal
            $table->timestamps();
        });

        // 3. Migration for Meal_Food Pivot Table
        Schema::create('meal_food', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_id')->constrained('meals')->onDelete('cascade');
            $table->foreignId('food_id')->constrained('food_items')->onDelete('cascade');
            $table->float('quantity');      // quantity of the food item in meal
            $table->string('unit')->nullable();   // unit of the quantity, e.g., grams, pieces
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_items');
        Schema::dropIfExists('meals');
        Schema::dropIfExists('meal_food');
    }
};
