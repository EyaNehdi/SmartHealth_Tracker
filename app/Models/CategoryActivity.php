<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryActivity extends Model
 {
       protected $table = 'categorie_activity'; // Spécifier le nom de la table
       protected $fillable = ['nom', 'description', 'statut', 'date_creation'];

       protected $casts = [
           'date_creation' => 'datetime',
           'created_at' => 'datetime',
           'updated_at' => 'datetime',
       ];
   }