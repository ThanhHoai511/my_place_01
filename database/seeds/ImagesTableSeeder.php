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
                'link' => 'cafe-cuoi-ngo.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 2,
                'new_id' => NULL,
                'link' => 'cafe-cuoi-ngo.jpg',
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
            ], [
                'review_id' => 4,
                'new_id' => NULL,
                'link' => 'cu-xa.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 5,
                'new_id' => NULL,
                'link' => 'bufetsenviet.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 6,
                'new_id' => NULL,
                'link' => 'bufetsenviet.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 7,
                'new_id' => NULL,
                'link' => 'buffet-shabu.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 8,
                'new_id' => NULL,
                'link' => 'buffet-shabu.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 9,
                'new_id' => NULL,
                'link' => 'trungtamchieuphim.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 10,
                'new_id' => NULL,
                'link' => 'trungtamchieuphim.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 11,
                'new_id' => NULL,
                'link' => 'cgv-vincom-nguyen-chi-thanh.jpg',
                'created_at' => new DateTime(),
            ], [
                'review_id' => 12,
                'new_id' => NULL,
                'link' => 'cgv-vincom-nguyen-chi-thanh.jpg',
                'created_at' => new DateTime(),
            ],
        ]);
    }
}
