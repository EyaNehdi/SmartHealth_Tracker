<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
      protected $table = 'meals';

    protected $fillable = [
        'created_by', 'name', 'description', 'meal_date',
    ];

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
}
