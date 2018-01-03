<?php

use Illuminate\Database\Seeder;

class RateReviewValsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rate_review_vals')->insert([
            [
                'user_id' => 1,
                'review_id' => 1,
                'rate_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'user_id' => 1,
                'review_id' => 2,
                'rate_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'user_id' => 2,
                'review_id' => 3,
                'rate_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'user_id' => 3,
                'review_id' => 1,
                'rate_id' => 1,
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
