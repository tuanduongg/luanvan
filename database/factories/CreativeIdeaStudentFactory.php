<?php

namespace Database\Factories;

use App\Models\CreativeIdea;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreativeIdeaStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrStudentId = Student::pluck('id');
        $creativeIdeas = CreativeIdea::pluck('id');
        return [
            'student_id' => $this->faker->randomElement($arrStudentId),
            'creative_idea_id' => $this->faker->randomElement($creativeIdeas),
        ];
    }
}
