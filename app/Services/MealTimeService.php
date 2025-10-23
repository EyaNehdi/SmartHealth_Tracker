<?php

namespace App\Services;

class MealTimeService
{
    /**
     * Get all meal time values
     */
    public static function getValues(): array
    {
        return config('meal_times.values');
    }

    /**
     * Get all meal time labels
     */
    public static function getLabels(): array
    {
        return config('meal_times.labels');
    }

    /**
     * Get label for a specific meal time value
     */
    public static function getLabel(string $value): string
    {
        return config("meal_times.labels.{$value}", $value);
    }

    /**
     * Check if a value is a valid meal time
     */
    public static function isValid(string $value): bool
    {
        return in_array($value, self::getValues());
    }

    /**
     * Get validation rule for meal time
     */
    public static function getValidationRule(): string
    {
        return config('meal_times.validation_rule');
    }

    /**
     * Get meal times formatted for select options
     */
    public static function getSelectOptions(): array
    {
        $options = [];
        foreach (self::getValues() as $value) {
            $options[$value] = self::getLabel($value);
        }
        return $options;
    }
}
