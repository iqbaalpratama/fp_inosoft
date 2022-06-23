<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssociateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vendor_name' => $this->faker->name(),
            'vendor_address' => [
                $this->faker->address(),
            ]
        ];
    }
}
