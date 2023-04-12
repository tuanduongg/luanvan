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
            'tittle' => $this->faker->text($maxNbChars = 100) ,
            'content' => $this->faker->text($maxNbChars = 500) ,
            'year' => $this->faker->randomElement(['2021-2022','2018-2019','2018-2019','2019-2020','2020-2021','2022-2023']),
            'archivist' => $this->faker->randomElement(['Đường Tuấn Hải','Lê Thu Hiền','Nguyễn Văn Ánh']),
            'storage_location' => 'Thư Viện HA10LN',
            'result' => $this->faker->randomElement(['Tốt','Xuất Sắc','Khá']),
        ];
    }
}
