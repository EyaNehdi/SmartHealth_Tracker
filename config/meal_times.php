<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Meal Time Values
    |--------------------------------------------------------------------------
    |
    | This configuration file centralizes the meal time enum values used
    | throughout the application for consistency and easy maintenance.
    |
    */

    'values' => [
        'breakfast',
        'snack', 
        'lunch',
        'dinner',
    ],

    /*
    |--------------------------------------------------------------------------
    | Meal Time Labels
    |--------------------------------------------------------------------------
    |
    | Human-readable labels for each meal time value.
    |
    */

    'labels' => [
        'breakfast' => 'Breakfast',
        'snack' => 'Snack',
        'lunch' => 'Lunch', 
        'dinner' => 'Dinner',
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation Rule
    |--------------------------------------------------------------------------
    |
    | Pre-built validation rule string for meal time validation.
    |
    */

    'validation_rule' => 'in:' . implode(',', [
        'breakfast',
        'snack',
        'lunch', 
        'dinner',
    ]),
];
