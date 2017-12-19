<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'review_id' => 1,
                'new_id' => NULL,
                'link' => 'review.png',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 2,
                'new_id' => NULL,
                'link' => 'review1.png',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 3,
                'new_id' => NULL,
                'link' => 'review.png',
                'created_at' => new DateTime(),
            ], [
                'review_id' => NULL,
                'new_id' => 1,
                'link' => 'new.png',
                'created_at' => new DateTime(),
            ], [
                'review_id' => NULL,
                'new_id' => 2,
                'link' => 'review.png',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 3,
                'new_id' => NULL,
                'link' => 'review3.png',
                'created_at' => new DateTime(),
            ], [
                'review_id' => NULL,
                'new_id' => 4,
                'link' => 'new4.png',
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
