<?php

namespace Database\Factories;

use App\Models\BasicResearch;
use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class BasicResearchLecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lecturerIds = Lecturer::pluck('id');
        $basicResearchs = BasicResearch::pluck('id');
        return [
            'lecturer_id' => $this->faker->randomElement($lecturerIds),
            'basic_research_id' => $this->faker->randomElement($basicResearchs),
            'isLeader' => $this->faker->randomElement([0,1]),
        ];
    }
}
