<?php

namespace Database\Factories;

use App\Models\DispatchType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispatcheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrTypeID = DispatchType::query()->pluck('id');
        return [
            'code' => substr($this->faker->unixTime(),0,8),
            'tittle' => $this->faker->text($maxNbChars = 200) ,
            'content' => $this->faker->text($maxNbChars = 200) ,
            'type_id' => $this->faker->randomElement($arrTypeID),
            'receiver' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'signer' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'sign_date' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'issued_date' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'published_place' => $this->faker->randomElement(['Trường ĐHKTKTCN','Bộ Giáo Dục','Thành Phố Hà Nội']), //nơi ban hành
            'effective_date' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'expiration_date' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'archivist' => $this->faker->randomElement(['Đường Tuấn Hải','Lê Thu Hiền','Nguyễn Văn Ánh']),
            'storage_location' => 'Thư Viện HA10LN',
            'role' => $this->faker->randomElement([1,2]),
        ];
    }
}
