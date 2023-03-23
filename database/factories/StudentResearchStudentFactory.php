<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\StudentResearch;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentResearchStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrStudentId = Student::pluck('id');
        $student_research_id = StudentResearch::pluck('id');
        return [
            'student_id' => $this->faker->randomElement($arrStudentId),
            'student_research_id' => $this->faker->randomElement($student_research_id),
        ];
    }
}
