<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            [
                'userfollower_id' => 1,
                'userfollowing_id' => 2,
                'created_at' => new DateTime(),
            ], [
                'userfollower_id' => 2,
                'userfollowing_id' => 3,
                'created_at' => new DateTime(),
            ], [
                'userfollower_id' => 2,
                'userfollowing_id' => 3,
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
