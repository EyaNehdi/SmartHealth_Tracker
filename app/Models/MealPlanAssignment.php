<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MealPlanAssignment extends Model
{
    use HasFactory;

    protected $table = 'meal_plan_assignments';

    protected $fillable = [
        'meal_plan_id',
        'meal_id',
        'day_number',
        'meal_time',
    ];

    protected $casts = [
        'day_number' => 'integer',
    ];

    // Relationships
    public function mealPlan(): BelongsTo
    {
        return $this->belongsTo(MealPlan::class);
    }

    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }

    // Scopes
    public function scopeForDay($query, $dayNumber)
    {
        return $query->where('day_number', $dayNumber);
    }

    public function scopeForMealTime($query, $mealTime)
    {
        return $query->where('meal_time', $mealTime);
    }

    public function scopeForDayAndTime($query, $dayNumber, $mealTime)
    {
        return $query->where('day_number', $dayNumber)->where('meal_time', $mealTime);
    }
}