<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;
    protected $table = 'food_items';

    protected $fillable = [
        'name', 'description', 'calories', 'protein', 'fat', 'carbs', 'serving_size', 'serving_type', 'image',
    ];

    protected $casts = [
        'calories' => 'integer',
        'protein' => 'float',
        'fat' => 'float',
        'carbs' => 'float',
        'serving_size' => 'integer',
    ];

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'meal_food', 'food_id', 'meal_id')
                    ->withPivot('quantity', 'unit');
    }

    // Accessor for formatted nutritional information
    public function getFormattedNutritionAttribute()
    {
        return [
            'calories' => $this->calories . ' cal',
            'protein' => $this->protein . 'g',
            'fat' => $this->fat . 'g',
            'carbs' => $this->carbs . 'g',
        ];
    }

    // Accessor for formatted serving size
    public function getFormattedServingSizeAttribute()
    {
        if ($this->serving_size && $this->serving_type) {
            return $this->serving_size . ' ' . $this->serving_type;
        }
        return null;
    }

    // Available serving types
    public static function getServingTypes()
    {
        return [
            'g' => 'Grams (g)',
            'oz' => 'Ounces (oz)',
            'slice' => 'Slice',
            'piece' => 'Piece',
            'cup' => 'Cup',
            'tbsp' => 'Tablespoon (tbsp)',
            'tsp' => 'Teaspoon (tsp)',
            'ml' => 'Milliliters (ml)',
            'other' => 'Other'
        ];
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

    public function scopeByNutritionRange($query, $field, $min = null, $max = null)
    {
        if ($min !== null) {
            $query->where($field, '>=', (float) $min);
        }
        
        if ($max !== null) {
            $query->where($field, '<=', (float) $max);
        }

        return $query;
    }

    public function scopeByCaloriesRange($query, $min = null, $max = null)
    {
        return $query->byNutritionRange('calories', $min, $max);
    }

    public function scopeByProteinRange($query, $min = null, $max = null)
    {
        return $query->byNutritionRange('protein', $min, $max);
    }

    public function scopeByFatRange($query, $min = null, $max = null)
    {
        return $query->byNutritionRange('fat', $min, $max);
    }

    public function scopeByCarbsRange($query, $min = null, $max = null)
    {
        return $query->byNutritionRange('carbs', $min, $max);
    }
}
