<?php

use Illuminate\Database\Seeder;

class RateRiviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rate_reviews')->insert([
            [
                'name' => 'Thích',
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
