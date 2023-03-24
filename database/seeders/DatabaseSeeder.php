<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Student::factory(1000)->create();
        // \App\Models\Lecturer::factory(100)->create();
        // \App\Models\Dispatche::factory(100)->create();
        // \App\Models\Theses::factory(50)->create();
        // \App\Models\ThesesStudent::factory(100)->create();
        // \App\Models\CreativeIdea::factory(100)->create();
        // \App\Models\CreativeIdeaStudent::factory(50)->create();
        // \App\Models\StudentResearch::factory(150)->create();
        // \App\Models\StudentResearchStudent::factory(50)->create();
        \App\Models\BasicResearch::factory(150)->create();
        \App\Models\BasicResearchLecturer::factory(50)->create();
    }
}
