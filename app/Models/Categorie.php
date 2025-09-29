<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'nom',
        'description',
    ];

    /**
     * Relation : une catégorie a plusieurs produits
     */
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
