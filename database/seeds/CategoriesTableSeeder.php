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
            ]
        ]);
    }
}
