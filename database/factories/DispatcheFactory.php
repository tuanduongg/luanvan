<?php

namespace Database\Factories;

use App\Models\DispatchType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Buihuycuong\Vnfaker\VNFaker;
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
            'tittle' => $this->faker->text($maxNbChars = 100) ,
            'content' => $this->faker->text($maxNbChars = 500) ,
            'type_id' => $this->faker->randomElement($arrTypeID),
            'receiver' =>VNFaker::fullname($word = 3),
            'signer' =>VNFaker::fullname($word = 3),
            'sign_date' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'issued_date' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'published_place' => $this->faker->randomElement(['Trường ĐHKTKTCN','Bộ Giáo Dục','Thành Phố Hà Nội','Sở Giáo Dục và Đào Tạo']), //nơi ban hành
            'effective_date' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'expiration_date' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'archivist' => $this->faker->randomElement(['Đường Tuấn Hải','Lê Thu Hiền','Nguyễn Văn Ánh']),
            'storage_location' => 'Thư Viện HA10LN',
            'role' => $this->faker->randomElement([1,2]),
        ];
    }
}
