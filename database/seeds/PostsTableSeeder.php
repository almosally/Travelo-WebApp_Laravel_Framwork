<?php

use Illuminate\Database\Seeder;
use App\Post as Post;
use App\User as User;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()

    {   $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 1,
            'title'=>$faker->sentence(3),
              'body'=>$faker->sentence(15),
            'cover_image'=>'p1.jpg',
            'user_id' =>1,
            'country_id'=>1,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 2,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'p2.jpg',
            'user_id' =>2,
            'country_id'=>1,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 3,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'p3.jpg',
            'user_id' =>3,
            'country_id'=>1,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 4,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'p4.jpg',
            'user_id' =>4,
            'country_id'=>1,

        ]);

//---it2
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 5,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'it1.jpg',
            'user_id' =>1,
            'country_id'=>2,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 6,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'it2.jpg',
            'user_id' =>2,
            'country_id'=>2,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 7,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'it3.jpg',
            'user_id' =>3,
            'country_id'=>2,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 8,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'it4.jpg',
            'user_id' =>6,
            'country_id'=>2,

        ]);

        //---ger

        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 9,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'ge1.jpg',
            'user_id' =>1,
            'country_id'=>3,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 10,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'ge2.jpg',
            'user_id' =>2,
            'country_id'=>3,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 11,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(25),
            'cover_image'=>'ge3.jpg',
            'user_id' =>3,
            'country_id'=>3,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 12,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(19),
            'cover_image'=>'ge4.jpg',
            'user_id' =>4,
            'country_id'=>3,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 13,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(25),
            'cover_image'=>'ge5.jpg',
            'user_id' =>4,
            'country_id'=>3,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 14,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(22),
            'cover_image'=>'ge6.jpg',
            'user_id' =>5,
            'country_id'=>3,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 15,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'it5.jpg',
            'user_id' =>6,
            'country_id'=>2,

        ]);

        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 16,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'it6.jpg',
            'user_id' =>6,
            'country_id'=>2,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 17,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'x2.jpg',
            'user_id' =>6,
            'country_id'=>2,

        ]);
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => 18,
            'title'=>$faker->sentence(3),
            'body'=>$faker->sentence(15),
            'cover_image'=>'x1.png',
            'user_id' =>6,
            'country_id'=>2,

        ]);


        //   factory(Post::class, 10)->create();


    }}

