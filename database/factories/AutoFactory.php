<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gos_nomer' => $this->faker->secondaryAddress,
            'color' => $this->faker->colorName,
            'vin' => $this->faker->isbn13,
            'brand' => $this->faker->company,
            'model' => $this->faker->jobTitle,
            'year' => $this->faker->year($max = 'now')
        ];
    }
}
