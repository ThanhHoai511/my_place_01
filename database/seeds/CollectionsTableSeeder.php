<?php

use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collections')->insert([
            [
                'name' => 'Yêu Thích',
                'user_id' => 1,
                'collection_id' => 1,
                'review_id' => NULL,
                'created_at' => new DateTime(),
            ], [
                'name' => 'Muốn Đi',
                'user_id' => 2,
                'collection_id' => 2,
                'review_id' => NULL,
                'created_at' => new DateTime(),
            ], [
                'name' => 'Đã Đi',
                'user_id' => 1,
                'collection_id' => 3,
                'review_id' => NULL,
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
