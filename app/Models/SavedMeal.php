<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavedMeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'meal_id',
    ];

    /**
     * Get the user that saved the meal
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the saved meal
     */
    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }
}
