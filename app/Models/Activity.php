<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    
       protected $fillable = ['nom', 'description', 'date', 'duree', 'categorie_activity_id', 'user_id', 'completed'];

       protected $casts = [
           'date' => 'datetime',
           'completed' => 'boolean',
           'created_at' => 'datetime',
           'updated_at' => 'datetime',
       ];

       public function category()
       {
           return $this->belongsTo(CategoryActivity::class, 'categorie_activity_id');
       }

       public function user()
       {
           return $this->belongsTo(User::class);
       }
   }