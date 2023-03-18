<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $code = substr($this->faker->unixTime(),0,8);
        return [
            'code' => $code,
            'name' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'email' => 'gv.' . $code . '@uneti.edu.vn',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => $this->faker->phoneNumber(),
            'role' => $this->faker->randomElement([1,2,3]),
        ];
    }
}
