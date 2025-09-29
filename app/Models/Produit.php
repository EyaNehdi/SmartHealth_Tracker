<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'image',
        'categorie_id',
    ];

    /**
     * Relation : un produit appartient à une catégorie
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
