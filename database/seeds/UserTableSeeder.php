<?php

use Illuminate\Database\Seeder;
use App\User as User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'kheir',
            'email' => 'kheir@admin.com',
            'password' => bcrypt('123456'),
            'image'=>'admin.jpeg',
            'admin'=>1,

        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Tsvetelina',
            'email' => 'T.Chantalieva@admin.com',
            'password' => bcrypt('123456'),
            'image'=>'6_1528291448.png',
            'admin'=>1,

        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'User',
            'email' => 'test@user.com',
            'password' => bcrypt('123456'),
            'image'=>'userPic.png',
            'admin'=>0,

        ]);

        factory(User::class, 3)->create();


    }
}
