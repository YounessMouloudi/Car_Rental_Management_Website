<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voiture>
 */
class VoitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => $this->faker->word,
            'marque' => $this->faker->randomElement(['mercedes', 'bmw','audi','dacia']),
            'immatriculation' => $this->faker->bothify('??-###-??'),
            'année' => $this->faker->numberBetween(2010, 2023),
            'transmission' => $this->faker->randomElement(['automatique', 'manual']),
            'type_carburant' => $this->faker->text(10),
            'portes' => $this->faker->numberBetween(4, 5),
            'places' => $this->faker->numberBetween(2, 7),
            'bagages' => $this->faker->numberBetween(2, 4),
            'prix_par_jour' => $this->faker->numberBetween(200, 1000),
            'assurance' => $this->faker->randomElement(['tous risque', 'sans risque']),
            'description' => $this->faker->paragraph,
            'état' => $this->faker->randomElement(['disponible', 'réservé']),
            'pénalité' => $this->faker->numberBetween(20, 50),
            'image_path' => $this->faker->imageUrl($width = 640, $height = 480, 'car-01.png', true),
        ];








        // return [
        //     'model' => fake()->name(),
        //     'marque' => fake()->company,
        //     'immatriculation' => fake(),
        //     'année' => fake()->numberBetween(2010,2023),
        //     'transmission' => fake()->randomElement(['automatique', 'manual']),
        //     'type_carburant' => fake(),
        //     'portes' => fake()->numberBetween(4,5),
        //     'places' => fake()->numberBetween(2,7),
        //     'bagages' => fake()->numberBetween(2,4),
        //     'color' => fake()->safeColorName,
        //     'prix_par_jour' => fake()->numberBetween(200,300,500,1000),
        //     'assurance' => fake()->randomElement(['tous risque', 'sans risque']),
        //     'description' => $this->faker->paragraph,
        //     'état' => fake()->randomElement(['disponible', 'réserveé']),
        //     'image_path' => fake(),
        // ];

    }
}
