<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments'; // Spécifier la table correcte

    protected $fillable = ['nom', 'type', 'description', 'statut'];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_equipment')
                    ->withPivot('commentaire')
                    ->withTimestamps();
    }
}