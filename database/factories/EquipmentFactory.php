<?php

namespace Database\Factories;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    protected $model = Equipment::class;

    public function definition()
{
    $types = ['cardio', 'musculation', 'rééducation', 'autre'];
    $etats = ['neuf', 'bon', 'usagé', 'à réparer'];
    $brands = ['Nike', 'Adidas', 'Reebok', 'Decathlon']; // marques valides

    return [
        'nom' => $this->faker->words(2, true),
        'type' => $this->faker->randomElement($types),
        'marque' => $this->faker->randomElement($brands),
        'image' => null,
        'etat' => $this->faker->randomElement($etats),
        'description' => $this->faker->sentence,
    ];
}

}
