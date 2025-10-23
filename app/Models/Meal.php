<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meal extends Model
{
    use HasFactory;

    protected $table = 'meals';

    protected $fillable = [
        'created_by',
        'name',
        'description',
        'notes',
        'image',
        'meal_time',
        'preparation_time',
        'recipe_description',
        'recipe_attachment',
        'tags',
        'total_calories',
        'total_protein',
        'total_fat',
        'total_carbs',
    ];

    protected $casts = [
        'tags' => 'array',
        'total_calories' => 'decimal:2',
        'total_protein' => 'decimal:2',
        'total_fat' => 'decimal:2',
        'total_carbs' => 'decimal:2',
        'preparation_time' => 'integer',
    ];

    // Relationships
    public function foodItems(): BelongsToMany
    {
        return $this->belongsToMany(FoodItem::class, 'meal_food', 'meal_id', 'food_id')
            ->withPivot('quantity', 'unit');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function mealPlans(): BelongsToMany
    {
        return $this->belongsToMany(MealPlan::class, 'meal_plan_assignments', 'meal_id', 'meal_plan_id')
            ->withPivot('day_number', 'meal_time')
            ->withTimestamps();
    }

    public function savedBy()
    {
        return $this->belongsToMany(User::class, 'saved_meals', 'meal_id', 'user_id')
            ->withTimestamps();
    }

    /**
     * Check if the meal is saved by a specific user
     */
    public function isSavedBy($userId)
    {
        return $this->savedBy()->where('user_id', $userId)->exists();
    }

    // Dynamic nutritional calculations (overriding the database fields)
    public function getCaloriesAttribute()
    {
        return $this->foodItems->sum(function ($item) {
            return $this->calculateNutritionalValue($item, 'calories');
        });
    }

    public function getProteinAttribute()
    {
        return $this->foodItems->sum(function ($item) {
            return $this->calculateNutritionalValue($item, 'protein');
        });
    }

    public function getFatAttribute()
    {
        return $this->foodItems->sum(function ($item) {
            return $this->calculateNutritionalValue($item, 'fat');
        });
    }

    public function getCarbohydratesAttribute()
    {
        return $this->foodItems->sum(function ($item) {
            return $this->calculateNutritionalValue($item, 'carbs');
        });
    }

    /**
     * Calculate nutritional value based on serving size and quantity
     */
    private function calculateNutritionalValue($foodItem, $nutrient)
    {
        $quantity = $foodItem->pivot->quantity;
        $unit = $foodItem->pivot->unit;
        $servingSize = $foodItem->serving_size;
        
        // Get the nutritional value per serving
        $nutritionPerServing = $foodItem->$nutrient;
        
        // If no serving size is specified, assume it's per 100g
        if (!$servingSize) {
            $servingSize = '100g';
        }
        
        // Parse serving size to get the base amount and unit
        $servingAmount = $this->parseServingSize($servingSize);
        
        // Convert quantity to the same unit as serving size
        $convertedQuantity = $this->convertToGrams($quantity, $unit);
        $convertedServingAmount = $this->convertToGrams($servingAmount['amount'], $servingAmount['unit']);
        
        // Calculate the multiplier
        $multiplier = $convertedQuantity / $convertedServingAmount;
        
        return $nutritionPerServing * $multiplier;
    }

    /**
     * Parse serving size string (e.g., "100g", "1 cup", "250ml")
     */
    private function parseServingSize($servingSize)
    {
        // Remove extra spaces and convert to lowercase
        $servingSize = trim(strtolower($servingSize));
        
        // Extract number and unit
        if (preg_match('/(\d+(?:\.\d+)?)\s*([a-zA-Z]+)/', $servingSize, $matches)) {
            return [
                'amount' => (float) $matches[1],
                'unit' => $matches[2]
            ];
        }
        
        // Default to 100g if parsing fails
        return ['amount' => 100, 'unit' => 'g'];
    }

    /**
     * Convert various units to grams for consistent calculation
     */
    private function convertToGrams($amount, $unit)
    {
        $unitConversions = [
            // Weight conversions (to grams)
            'g' => 1,
            'gram' => 1,
            'grams' => 1,
            'kg' => 1000,
            'kilogram' => 1000,
            'kilograms' => 1000,
            'oz' => 28.35,
            'ounce' => 28.35,
            'ounces' => 28.35,
            'lb' => 453.59,
            'pound' => 453.59,
            'pounds' => 453.59,
            
            // Volume conversions (approximate to grams for liquids)
            'ml' => 1, // Assuming 1ml = 1g for water-based liquids
            'milliliter' => 1,
            'milliliters' => 1,
            'l' => 1000,
            'liter' => 1000,
            'liters' => 1000,
            'cup' => 240, // 1 cup ≈ 240ml
            'cups' => 240,
            'tbsp' => 15, // 1 tablespoon ≈ 15ml
            'tablespoon' => 15,
            'tablespoons' => 15,
            'tsp' => 5, // 1 teaspoon ≈ 5ml
            'teaspoon' => 5,
            'teaspoons' => 5,
            
            // Count-based items (approximate weights)
            'piece' => 50, // Average piece weight
            'pieces' => 50,
            'slice' => 25, // Average slice weight
            'slices' => 25,
        ];
        
        $unit = strtolower(trim($unit));
        
        if (isset($unitConversions[$unit])) {
            return $amount * $unitConversions[$unit];
        }
        
        // Default to grams if unit not recognized
        return $amount;
    }

    // Accessor for formatted nutritional information
    public function getFormattedNutritionAttribute()
    {
        return [
            'calories' => round($this->calories, 2) . ' cal',
            'protein' => round($this->protein, 2) . 'g',
            'fat' => round($this->fat, 2) . 'g',
            'carbs' => round($this->carbohydrates, 2) . 'g',
        ];
    }

    // Accessor for formatted preparation time
    public function getFormattedPreparationTimeAttribute()
    {
        if (!$this->preparation_time) {
            return 'Not specified';
        }

        $hours = floor($this->preparation_time / 60);
        $minutes = $this->preparation_time % 60;

        if ($hours > 0) {
            return $minutes > 0 ? "{$hours}h {$minutes}m" : "{$hours}h";
        }

        return "{$minutes}m";
    }

    // Method to update nutritional totals in database
    public function updateNutritionalTotals()
    {
        // Reload the relationship to get fresh data
        $this->load('foodItems');
        
        $this->updateQuietly([
            'total_calories' => round($this->calories, 2),
            'total_protein' => round($this->protein, 2),
            'total_fat' => round($this->fat, 2),
            'total_carbs' => round($this->carbohydrates, 2),
        ]);
    }

    /**
     * Recalculate nutritional totals for all meals
     * Useful for fixing existing data or after updating calculation logic
     */
    public static function recalculateAllNutritionalTotals()
    {
        $meals = static::with('foodItems')->get();
        
        foreach ($meals as $meal) {
            $meal->updateNutritionalTotals();
        }
        
        return $meals->count();
    }

    /**
     * Get detailed nutritional breakdown for debugging
     */
    public function getNutritionalBreakdown()
    {
        $breakdown = [];
        
        foreach ($this->foodItems as $foodItem) {
            $quantity = $foodItem->pivot->quantity;
            $unit = $foodItem->pivot->unit;
            $servingSize = $foodItem->serving_size;
            
            $servingAmount = $this->parseServingSize($servingSize ?: '100g');
            $convertedQuantity = $this->convertToGrams($quantity, $unit);
            $convertedServingAmount = $this->convertToGrams($servingAmount['amount'], $servingAmount['unit']);
            $multiplier = $convertedQuantity / $convertedServingAmount;
            
            $breakdown[] = [
                'food_name' => $foodItem->name,
                'quantity' => $quantity,
                'unit' => $unit,
                'serving_size' => $servingSize,
                'multiplier' => round($multiplier, 3),
                'calories' => round($foodItem->calories * $multiplier, 2),
                'protein' => round($foodItem->protein * $multiplier, 2),
                'fat' => round($foodItem->fat * $multiplier, 2),
                'carbs' => round($foodItem->carbs * $multiplier, 2),
            ];
        }
        
        return $breakdown;
    }

    // Query Scopes for filtering - Laravel best practice
    public function scopeSearch($query, $search)
    {
        if (empty($search)) {
            return $query;
        }

        return $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }

    public function scopeByMealTimes($query, array $mealTimes)
    {
        if (empty($mealTimes)) {
            return $query;
        }

        return $query->whereIn('meal_time', $mealTimes);
    }

    public function scopeByCaloriesRange($query, $min = null, $max = null)
    {
        if ($min !== null) {
            $query->where('total_calories', '>=', (float) $min);
        }
        
        if ($max !== null) {
            $query->where('total_calories', '<=', (float) $max);
        }

        return $query;
    }

    public function scopeByPreparationTimeRange($query, $min = null, $max = null)
    {
        if ($min !== null) {
            $query->where('preparation_time', '>=', (int) $min);
        }
        
        if ($max !== null) {
            $query->where('preparation_time', '<=', (int) $max);
        }

        return $query;
    }

    public function scopeOwnedBy($query, $userId)
    {
        return $query->where('created_by', $userId);
    }

    public function scopeSavedBy($query, $userId)
    {
        return $query->whereHas('savedBy', function($q) use ($userId) {
            $q->where('user_id', $userId);
        });
    }

    public function scopeByFilter($query, $filter, $userId = null)
    {
        if (!$userId || !$filter) {
            return $query;
        }

        switch ($filter) {
            case 'owned':
                return $query->ownedBy($userId);
            case 'saved':
                return $query->savedBy($userId);
            default:
                return $query;
        }
    }
}
