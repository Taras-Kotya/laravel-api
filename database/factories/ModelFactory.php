<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
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
            'brand_id' => rand(500,1000),
            'time_create' => rand( (time()-(3600*24*365*3)),(time()+(3600*24*365))),
            'time_refresh' =>  rand( (time()-(3600*24*365*3)),(time()+(3600*24*365)))
       ];
    }
}
