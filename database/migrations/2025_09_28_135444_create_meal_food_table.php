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
            $table->string('image')->nullable(); //e.g, img_url
            $table->timestamps();
        });

        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('meal_type')->nullable();
            $table->text('notes')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

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
