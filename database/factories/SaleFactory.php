<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,3),
            'country_id' => 1,
            'state_id' => 14,
            'city_id' => 1,
            'suburb_id' => rand(1,3),
            'description' => $this->faker->paragraph($nbSentences = 1, $variableNbSentences = true),
            'status' => 'Activa',
            'property_type' => $this->faker->randomElement($array = array('Casa', 'Departamento', 'Terreno')),
            'street' => $this->faker->streetAddress(),
            'price' => rand(50000,5000000),
            'sale_type' => $this->faker->randomElement($array = array('Renta', 'Venta', 'Preventa')),
            'created_at' => $this->faker->dateTimeBetween($startDate = Carbon::today()->subDays(7), $endDate = 'now', $timezone = null)
        ];
    }
}
