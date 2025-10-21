<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MealPlan extends Model
{
    use HasFactory;

    protected $table = 'meal_plans';

    protected $fillable = [
        'name',
        'description',
        'total_days',
        'created_by',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'total_days' => 'integer',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(MealPlanAssignment::class);
    }

    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(Meal::class, 'meal_plan_assignments', 'meal_plan_id', 'meal_id')
            ->withPivot('day_number', 'meal_time');
    }

    // Method to get meals for a specific day
    public function getMealsForDay($dayNumber)
    {
        return $this->meals()->wherePivot('day_number', $dayNumber)->withPivot('day_number', 'meal_time')->get();
    }

    // Method to get meals for a specific meal time
    public function getMealsForMealTime($mealTime)
    {
        return $this->meals()->wherePivot('meal_time', $mealTime)->withPivot('day_number', 'meal_time')->get();
    }

    // Method to get meals grouped by day with proper pivot data
    public function getMealsGroupedByDay()
    {
        $meals = $this->meals()->withPivot('day_number', 'meal_time')->get();
        $grouped = [];
        
        foreach ($meals as $meal) {
            $dayNumber = $meal->pivot->day_number;
            if (!isset($grouped[$dayNumber])) {
                $grouped[$dayNumber] = [];
            }
            $grouped[$dayNumber][] = $meal;
        }
        
        return $grouped;
    }

    // Method to get meals organized by day and meal time
    public function getMealsByDayAndTime()
    {
        $meals = $this->meals()->withPivot('day_number', 'meal_time')->get();
        $organized = [];
        
        foreach ($meals as $meal) {
            $dayNumber = $meal->pivot->day_number;
            $mealTime = $meal->pivot->meal_time;
            
            if (!isset($organized[$dayNumber])) {
                $organized[$dayNumber] = [];
            }
            
            $organized[$dayNumber][$mealTime] = $meal;
        }
        
        return $organized;
    }

    // Method to calculate total nutritional values for the plan
    public function getTotalNutritionAttribute()
    {
        $meals = $this->meals;
        
        return [
            'calories' => $meals->sum('total_calories'),
            'protein' => $meals->sum('total_protein'),
            'fat' => $meals->sum('total_fat'),
            'carbs' => $meals->sum('total_carbs'),
        ];
    }

    // Method to get meal count for a specific day
    public function getMealCountForDay($dayNumber)
    {
        return $this->assignments()->where('day_number', $dayNumber)->count();
    }

    // Method to get meal count for a specific meal time
    public function getMealCountForMealTime($mealTime)
    {
        return $this->assignments()->where('meal_time', $mealTime)->count();
    }

    // Method to check if a day/time slot has a meal assigned
    public function hasMealAt($dayNumber, $mealTime)
    {
        return $this->assignments()
            ->where('day_number', $dayNumber)
            ->where('meal_time', $mealTime)
            ->exists();
    }

    // Method to get meal at specific day/time
    public function getMealAt($dayNumber, $mealTime)
    {
        return $this->meals()
            ->wherePivot('day_number', $dayNumber)
            ->wherePivot('meal_time', $mealTime)
            ->first();
    }

    // Scope for active meal plans
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for meal plans by total days range
    public function scopeByDaysRange($query, $minDays = null, $maxDays = null)
    {
        if ($minDays !== null) {
            $query->where('total_days', '>=', $minDays);
        }
        if ($maxDays !== null) {
            $query->where('total_days', '<=', $maxDays);
        }
        return $query;
    }

    // Additional Query Scopes for filtering
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

    public function scopeByStatuses($query, array $statuses)
    {
        if (empty($statuses)) {
            return $query;
        }

        $activeStatuses = [];
        foreach ($statuses as $status) {
            if ($status === 'active') {
                $activeStatuses[] = true;
            } elseif ($status === 'inactive') {
                $activeStatuses[] = false;
            }
        }

        if (!empty($activeStatuses)) {
            return $query->whereIn('is_active', $activeStatuses);
        }

        return $query;
    }
}