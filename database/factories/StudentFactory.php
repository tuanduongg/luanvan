<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Buihuycuong\Vnfaker\VNFaker;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $khoa = $this->faker->randomElement([7,8,9,10,11,12,13,14,15,16]);
        return [
            'student_code' => $khoa . substr($this->faker->unixTime(),0,8),
            'student_name' => VNFaker::fullname($word = 3),
            'student_class' => 'DHTI'. $khoa. 'A' . $this->faker->randomElement([1,2,3,4,5]) . 'HN',
            'student_school_year' => $khoa,
        ];
    }
}
