<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
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
