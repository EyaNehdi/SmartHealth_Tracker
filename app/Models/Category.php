<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $fillable = ['nom', 'description', 'statut', 'date_creation'];

    protected $casts = [
        'date_creation' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

