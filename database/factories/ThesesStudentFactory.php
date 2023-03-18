<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Theses;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThesesStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrStudentId = Student::pluck('id');
        $arrthesesId = Theses::pluck('id');
        return [
            'student_id' => $this->faker->randomElement($arrStudentId),
            'theses_id' => $this->faker->randomElement($arrthesesId),
        ];
    }
}
