<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    public function run() {
        $faker = Faker::create();

        for ($i = 0; $i < 500; $i++) {
            $first_name = $faker->firstName;
            $last_name  = $faker->lastName;

            $id = DB::table('users')->insertGetId(array(
                'first_name'    => $first_name,
                'last_name'     => $last_name,
                'full_name'     => $first_name . ' ' . $last_name,
                'email'         => $faker->unique()->email,
                'password'      => Hash::make('123456'),
                'type'          => $faker->randomElement(['user', 'editor', 'contributor', 'subscriber'])
            ));

            DB::table('user_profiles')->insert(array(
                'user_id'   => $id,
                'biography' => $faker->paragraph(rand(2, 5)),
                'twitter'   => 'http://www.twitter.com/' . $faker->userName,
                'website'   => 'http://www.' . $faker->domainName,
                'birthdate' => $faker->dateTimeBetween('-55 years', '-15 years')->format('Y-m-d')
            ));
        }
    }
}