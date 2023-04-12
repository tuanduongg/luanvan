<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Buihuycuong\Vnfaker\VNFaker;
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
            'name' => VNFaker::fullname($word = 3),
            'email' => 'gv.' . $code . '@uneti.edu.vn',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' =>VNFaker::mobilephone($numbers = 10),
            'role' => 3,
        ];
    }
}
