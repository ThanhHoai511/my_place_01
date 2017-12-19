<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'content' => 'democomment',
                'user_id' => 1,
                'review_id' => 2,
                'created_at' => new DateTime(),
            ], [
                'content' => 'democomment',
                'user_id' => 2,
                'review_id' => 1,
                'created_at' => new DateTime(),
            ], [
                'content' => 'democomment',
                'user_id' => 3,
                'review_id' => 1,
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
