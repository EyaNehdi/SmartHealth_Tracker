<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = ['titre', 'description', 'dateDebut', 'dateFin', 'created_by', 'image'];

   protected $casts = [
    'dateDebut' => 'datetime',
    'dateFin' => 'datetime',
    'is_famous' => 'boolean',
];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'challenge_user', 'challenge_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function isParticipatedBy($userId)
    {
        return $this->participations()->where('user_id', $userId)->exists() ||
               $this->created_by === $userId;
    }
}
