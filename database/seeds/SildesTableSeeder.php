<?php

use Illuminate\Database\Seeder;

class SildesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            [
                'image' => 'slide1.png',
                'description' => 'Giới thiệu slide 1',
                'created_at' => new DateTime(),
            ], [
                'image' => 'slide2.png',
                'description' => 'Giới thiệu slide 2',
                'created_at' => new DateTime(),
            ], [
                'image' => 'slide3.png',
                'description' => 'Giới thiệu slide 3',
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
