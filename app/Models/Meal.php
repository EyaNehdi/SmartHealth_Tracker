<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $table = 'meals';

    protected $fillable = [
        'created_by',
        'name',
        'description',
        'meal_type',
        'notes',
        'image',
    ];

    // Relationships
    public function foodItems()
    {
        return $this->belongsToMany(FoodItem::class, 'meal_food', 'meal_id', 'food_id')
            ->withPivot('quantity', 'unit')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Accessors to calculate nutritional values from food items with pivot quantities
    public function getCaloriesAttribute()
    {
        return $this->foodItems->sum(function ($item) {
            return $item->calories * $item->pivot->quantity;
        });
    }

    public function getProteinAttribute()
    {
        return $this->foodItems->sum(function ($item) {
            return $item->protein * $item->pivot->quantity;
        });
    }

    public function getFatAttribute()
    {
        return $this->foodItems->sum(function ($item) {
            return $item->fat * $item->pivot->quantity;
        });
    }

    public function getCarbohydratesAttribute()
    {
        return $this->foodItems->sum(function ($item) {
            return $item->carbs * $item->pivot->quantity;
        });
    }
}
