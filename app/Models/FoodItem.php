<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
     protected $table = 'food_items';

    protected $fillable = [
        'name', 'description', 'calories', 'protein', 'fat', 'carbs', 'serving_size',
    ];

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'meal_food', 'food_id', 'meal_id')
                    ->withPivot('quantity', 'unit')
                    ->withTimestamps();
    }
}
