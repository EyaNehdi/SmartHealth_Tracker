<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    protected $model = \App\Models\Categorie::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word(),
            'description' => $this->faker->sentence(),
        ];
    }
}
