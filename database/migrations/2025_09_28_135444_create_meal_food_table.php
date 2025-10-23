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
            $table->string('name')->unique(); // Add unique constraint
            $table->text('description')->nullable();
            $table->integer('calories');        // calories per serving
            $table->float('protein');     // grams of protein per serving
            $table->float('fat');         // grams of fat per serving
            $table->float('carbs');       // grams of carbohydrates per serving
            $table->integer('serving_size')->nullable(); // numeric serving size
            $table->string('serving_type')->nullable(); // serving type (g, oz, slice, etc.)
            $table->string('image')->nullable(); //e.g, img_url
            $table->timestamps();
            
            // Add indexes for better performance
            $table->index('calories');
            $table->index('protein');
        });

        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->string('image')->nullable();
            
            // Enhanced meal tracking fields
            $table->enum('meal_time', ['breakfast', 'snack', 'lunch', 'dinner'])->nullable();
            $table->integer('preparation_time')->nullable()->comment('Preparation time in minutes');
            $table->text('recipe_description')->nullable();
            $table->string('recipe_attachment')->nullable()->comment('File path or external URL');
            $table->json('tags')->nullable()->comment('JSON array of tags like vegan, gluten-free, keto');
            
            // Add calculated nutritional fields (will be updated via model events)
            $table->decimal('total_calories', 8, 2)->default(0);
            $table->decimal('total_protein', 8, 2)->default(0);
            $table->decimal('total_fat', 8, 2)->default(0);
            $table->decimal('total_carbs', 8, 2)->default(0);
            
            $table->timestamps();
            
            // Add indexes for better performance
            $table->index('meal_time');
            $table->index('preparation_time');
            $table->index('total_calories');
        });

        Schema::create('meal_food', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_id')->constrained('meals')->onDelete('cascade');
            $table->foreignId('food_id')->constrained('food_items')->onDelete('cascade');
            $table->float('quantity');      // quantity of the food item in meal
            $table->enum('unit', ['g', 'kg', 'ml', 'l', 'pieces', 'cups', 'tbsp', 'tsp', 'oz', 'lb'])->nullable();   // predefined units
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
