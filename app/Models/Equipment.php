<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipments';

    protected $fillable = ['nom', 'type', 'marque', 'image', 'etat', 'description'];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_equipment')
                    ->withPivot('commentaire')
                    ->withTimestamps();
    }
}