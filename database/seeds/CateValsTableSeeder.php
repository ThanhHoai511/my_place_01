<?php

use Illuminate\Database\Seeder;

class CateValsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cate_vals')->insert([
            [
                'place_id' => 1,
                'cate_id' => 1,
                'review_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'place_id' => 2,
                'cate_id' => 2,
                'review_id' => 2,
                'created_at' => new DateTime(),
            ], [
                'place_id' => 3,
                'cate_id' => 3,
                'review_id' => 3,
                'created_at' => new DateTime(),
            ], [
                'place_id' => 4,
                'cate_id' => 4,
                'review_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'place_id' => 5,
                'cate_id' => 2,
                'review_id' => 4,
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
