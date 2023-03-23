<?php

namespace Database\Factories;

use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentResearchFactory extends Factory
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
            'tittle' => $this->faker->text($maxNbChars = 200) ,
            'content' => $this->faker->text($maxNbChars = 500) ,
            'lecturer_id' => $this->faker->randomElement($arrLecturerId),
            'year' => $this->faker->randomElement(['2021','2022','2018','2019','2023']),
            'result' => $this->faker->randomElement(['Chuẩn Bị Thực Hiện','Đang Thực Hiện','Hoàn Thành']),
            'archivist' => $this->faker->randomElement(['Đường Tuấn Hải','Lê Thu Hiền','Nguyễn Văn Ánh']),
            'storage_location' => 'Thư Viện HA10LN',
            'file' => 'l871LphyOMANjg5BEn9H2H2F4VxM7V3K3QHv9cJZ.jpg',
        ];
    }
}
