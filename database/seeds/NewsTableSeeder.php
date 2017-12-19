<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => 'Khuyễn mãi cuối năm',
                'description' => 'giới thiệu khuyến mãi',
                'start_date' => '2017-12-05',
                'to_date' => '2017-12-21',
                'created_at' => new DateTime(),
            ], [
                'title' => 'Khuyễn mãi giáng sinh',
                'description' => 'giới thiệu khuyến mãi',
                'start_date' => '2017-12-01',
                'to_date' => '2017-12-21',
                'created_at' => new DateTime(),
            ], [
                'title' => 'Khuyễn mãi Tết',
                'description' => 'giới thiệu khuyến mãi',
                'start_date' => '2017-12-19',
                'to_date' => '2018-02-21',
                'created_at' => new DateTime(),
            ], [
                'title' => 'Khai chương AOEN',
                'description' => 'giới thiệu khuyến mãi',
                'start_date' => '2017-12-05',
                'to_date' => '2017-12-12',
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
