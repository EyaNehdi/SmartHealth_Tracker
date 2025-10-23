<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MinMealsPerDay implements ValidationRule
{
    protected $totalDays;

    public function __construct($totalDays = 1)
    {
        $this->totalDays = (int) $totalDays;
    }

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // If no assignments provided, fail validation
        if (empty($value) || !is_array($value)) {
            $fail('At least one meal per day is required.');
            return;
        }

        // Group assignments by day
        $mealsByDay = [];
        foreach ($value as $assignment) {
            if (isset($assignment['day_number']) && isset($assignment['meal_id']) && !empty($assignment['meal_id'])) {
                $day = (int) $assignment['day_number'];
                if (!isset($mealsByDay[$day])) {
                    $mealsByDay[$day] = 0;
                }
                $mealsByDay[$day]++;
            }
        }

        // Check if each day has at least one meal
        $daysWithoutMeals = [];
        for ($day = 1; $day <= $this->totalDays; $day++) {
            if (!isset($mealsByDay[$day]) || $mealsByDay[$day] === 0) {
                $daysWithoutMeals[] = $day;
            }
        }

        if (!empty($daysWithoutMeals)) {
            if (count($daysWithoutMeals) === 1) {
                $fail("Day {$daysWithoutMeals[0]} must have at least one meal assigned.");
            } else {
                $daysList = implode(', ', $daysWithoutMeals);
                $fail("Days {$daysList} must have at least one meal assigned.");
            }
        }
    }
}