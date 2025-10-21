<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produit;
use App\Models\Categorie;

class ProduitFactory extends Factory
{
    protected $model = Produit::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'prix' => $this->faker->randomFloat(2, 10, 500),
            'stock' => $this->faker->numberBetween(0, 100),
            'categorie_id' => Categorie::factory(), // génère une catégorie automatiquement
            'image' => null, // tu peux mettre une image fake si tu veux
        ];
    }
}
