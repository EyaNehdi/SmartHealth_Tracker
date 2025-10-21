<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Challenge;
use App\Models\Participation;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

   
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function isAdmin()
{
    return $this->role === 'admin'; // Adjust based on your role logic
}
    public function challengesCreated()
    {
        return $this->hasMany(Challenge::class, 'created_by');
    }

    public function challengesParticipating()
    {
        return $this->belongsToMany(Challenge::class, 'participations', 'user_id', 'challenge_id');
    }

    /**
     * Get the user's participations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    // Meal-related relationships
    public function meals()
    {
        return $this->hasMany(Meal::class, 'created_by');
    }

    public function mealPlans()
    {
        return $this->hasMany(MealPlan::class, 'created_by');
    }
}