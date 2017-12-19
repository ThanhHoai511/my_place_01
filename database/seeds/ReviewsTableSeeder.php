<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'submary' => 'Thưởng thức Cafe Cuối Ngõ',
                'place_id' => 1,
                'content' => 'Content cafe cuoi ngo',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Sống chậm ở Cafe cuối ngõ',
                'place_id' => 1,
                'content' => 'Content cafe cuoi ngo',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Checkin tại cư xá cafe',
                'place_id' => 2,
                'content' => 'Content cafe cư xá',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'cư xá cafe-Hẹn hò cuối tuần',
                'place_id' => 2,
                'content' => 'Content cafe cư xá',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Buffe Sen Việt,giá rẻ cho mọi nhà',
                'place_id' => 3,
                'content' => 'Content buffer',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Buffe Sen Việt,ăn lo thỏa thích',
                'place_id' => 3,
                'content' => 'Content buffer',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Ăn lẩu nhật bản tại Hà Nội',
                'place_id' => 4,
                'content' => 'Content lẩu nhật bản',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Ăn lẩu On-Yasai Shabu ',
                'place_id' => 4,
                'content' => 'Content lẩu nhật bản',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Xem King-Man tại rạp quốc gia',
                'place_id' => 5,
                'content' => 'Content xem phim king man',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Xem người sắt tại rạp quốc gia',
                'place_id' => 5,
                'content' => 'Content xem phim người sắt',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Xem người sắt tại CGV',
                'place_id' => 6,
                'content' => 'Content xem phim người sắt',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Xem Annable tại CGV',
                'place_id' => 6,
                'content' => 'Content xem phim Annable',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 5,
                'quality_rate' => 5,
                'status' => '1', 
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
