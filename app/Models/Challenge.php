<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Participation;

class Challenge extends Model
{
    protected $fillable = ['titre', 'description', 'dateDebut', 'dateFin', 'created_by', 'image'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    public function isParticipatedBy($userId)
    {
        return $this->participations()->where('user_id', $userId)->exists();
    }
}
