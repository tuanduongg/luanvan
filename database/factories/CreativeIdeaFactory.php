<?php

namespace Database\Factories;

use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreativeIdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrLecturerId = Lecturer::query()->pluck('id');
        return [
            'tittle' => $this->faker->text($maxNbChars = 100) ,
            'content' => $this->faker->text($maxNbChars = 500) ,
            'lecturer_id' => $this->faker->randomElement($arrLecturerId),
            'school_year' => $this->faker->randomElement(['2021-2022','2022-2023','2018-2019','2019-2020','2020-2021','2022-2023']),
            'start_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'archivist' => $this->faker->randomElement(['Đường Tuấn Hải','Lê Thu Hiền','Nguyễn Văn Ánh']),
            'storage_location' => 'Thư Viện HA9LN',
        ];
    }
}
