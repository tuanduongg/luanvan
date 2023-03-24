<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BasicResearchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tittle' => $this->faker->text($maxNbChars = 200) ,
            'content' => $this->faker->text($maxNbChars = 200) ,
            'year' => $this->faker->randomElement(['2021','2022','2018','2019']),
            'archivist' => $this->faker->randomElement(['Đường Tuấn Hải','Lê Thu Hiền','Nguyễn Văn Ánh']),
            'storage_location' => 'Thư Viện HA10LN',
            'file' => 'l871LphyOMANjg5BEn9H2H2F4VxM7V3K3QHv9cJZ.jpg',
            'result' => $this->faker->randomElement(['Đang thực hiện','Đã hoàn thành','Đã được duyệt']),
        ];
    }
}
