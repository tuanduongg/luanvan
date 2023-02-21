<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DispatchTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_code' => '',
            'type_name' => '',
        ];
    }
}
