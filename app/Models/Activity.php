<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Activity extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'tags',
        'date_debut',
        'date_fin',
        'duree',
        'image',
        'support_pdf',
        'support_video',
        'prix',
        'avis',
        'likes',
        'categorie_activity_id',
        'user_id',
        'completed',
    ];

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'likes' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryActivity::class, 'categorie_activity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class, 'activity_equipment')
                    ->withPivot('commentaire')
                    ->withTimestamps();
    }

   

    // Relations pour les likes (avis)
    public function likedBy()
    {
        return $this->belongsToMany(User::class, 'activity_user_likes')
                    ->withTimestamps();
    }

    public function isLikedByUser($userId)
    {
        return $this->likedBy()->where('user_id', $userId)->exists();
    }

    public function paidUsers()
    {
        return $this->belongsToMany(User::class, 'activity_user_payments')
                    ->withPivot('session_id')
                    ->withTimestamps();
    }

    public function hasPaid($userId)
    {
        return $this->paidUsers()->where('user_id', $userId)->exists();
    }

    // Relations pour les ratings (gardées si utilisées ailleurs)
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }

    public function userRating($userId = null)
    {
        $userId = $userId ?? (Auth::check() ? Auth::id() : null);
        if (!$userId) {
            return 0;
        }

        $rating = $this->ratings()->where('user_id', $userId)->first();
        return $rating ? $rating->rating : 0;
    }
    public function comments()
{
    return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
}
}