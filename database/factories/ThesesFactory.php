<?php

namespace Database\Factories;

use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThesesFactory extends Factory
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
            'code' => 'LV' . substr($this->faker->unixTime(),0,8),
            'tittle' => $this->faker->text($maxNbChars = 200) ,
            'content' => $this->faker->text($maxNbChars = 200) ,
            'lecturer_id' => $this->faker->randomElement($arrLecturerId),
            'school_year' => $this->faker->randomElement(['2021','2022','2018','2019']),
            'start_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'end_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'archivist' => $this->faker->randomElement(['Đường Tuấn Hải','Lê Thu Hiền','Nguyễn Văn Ánh']),
            'storage_location' => 'Thư Viện HA10LN',
        ];
    }
}
