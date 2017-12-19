<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'huusu1996@gmail.com',
                'password' => bcrypt('123456'),
                'avatar' => 'admin.jpg',                
                'add' => 'Hà Nội, Việt Nam',
                'phone' => '0123456789',
                'level' => 'admin',
                'dateofbirth' => '1996-05-18',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Nguyen Huu Su',
                'email' => 'nguyen.huu.su@framgia.com',
                'password' => bcrypt('123456'),
                'avatar' => 'default.jpg',                
                'add' => 'Hà Nội, Việt Nam',
                'phone' => '01639091805',
                'level' => 'member',
                'dateofbirth' => '1996-05-18',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Pham Thu Hang',
                'email' => 'phamthuhang@gmail.com',
                'password' => bcrypt('123456'),
                'avatar' => 'default.jpg',                
                'add' => 'Hà Nội, Việt Nam',
                'phone' => '01639091806',
                'level' => 'member',
                'dateofbirth' => '1996-05-19',
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
