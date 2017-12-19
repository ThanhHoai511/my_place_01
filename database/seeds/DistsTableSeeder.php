<?php

use Illuminate\Database\Seeder;

class DistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dists')->insert([
            [
                'name' => 'Quận Ba Đình',
                'city_id' => 1,
                'created_at' => new DateTime()
            ], [
                'name' => 'Quận Hoàn Kiếm',
                'city_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'name' => 'Quận Hai Bà Trưng',
                'city_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'name' => 'Quận Tây Hồ',
                'city_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'name' => 'Quận Thanh Xuân',
                'city_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'name' => 'Quận Hoàng Mai',
                'city_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'name' => 'Quận Long Biên',
                'city_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'name' => 'Huyện Từ Liêm',
                'city_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'name' => '	Huyện Thanh Trì',
                'city_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'name' => 'Huyện Gia Lâm',
                'city_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'name' => 'Huyện Đông Anh',
                'city_id' => 1,
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
