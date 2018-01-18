<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Ăn',
                'parent_id' => NULL,
                'type_concept' => 'Cổ điển',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Uống',
                'parent_id' => NULL,
                'type_concept' => 'Cổ điển',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Xem Phim',
                'parent_id' => NULL,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Khám Phá',
                'parent_id' => NULL,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Buffet',
                'parent_id' => 1,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Nhà Hàng',
                'parent_id' => 1,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Ăn Vặt',
                'parent_id' => 1,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Quán Lẩu',
                'parent_id' => 1,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Cafe',
                'parent_id' => 2,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Trà Sữa',
                'parent_id' => 2,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Chè',
                'parent_id' => 2,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Beer club',
                'parent_id' => 2,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Rạp',
                'parent_id' => 3,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Cafe Phim',
                'parent_id' => 3,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Game-center',
                'parent_id' => 4,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Karaoke',
                'parent_id' => 4,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Công viên',
                'parent_id' => 3,
                'type_concept' => 'Hiện Đại',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Địa điểm khác',
                'parent_id' => NULL,
                'type_concept' => 'Cổ điển',
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
