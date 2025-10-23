<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
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
