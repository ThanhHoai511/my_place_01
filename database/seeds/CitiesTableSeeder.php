<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'name' => 'Hà Nội',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Đà Nẵng',
                'created_at' => new DateTime(),
            ], [
                'name' => 'TP.HCM',
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
