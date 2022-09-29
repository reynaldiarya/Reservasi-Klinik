<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nama_pasien' =>$this->faker->name(),
            'user_id' => $this->faker->numberBetween(12, 22),
            
        ];
    }
}
