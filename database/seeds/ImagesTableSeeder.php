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
                'link' => 'cafe-cuoi-ngo-1.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 2,
                'new_id' => NULL,
                'link' => 'cafe-cuoi-ngo-1.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 3,
                'new_id' => NULL,
                'link' => 'cu-xa.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => NULL,
                'new_id' => 1,
                'link' => 'cu-xa.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => NULL,
                'new_id' => 2,
                'link' => 'cu-xa.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 3,
                'new_id' => NULL,
                'link' => 'cu-xa.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => NULL,
                'new_id' => 4,
                'link' => 'cu-xa.jpg',
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
