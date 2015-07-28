<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Faker\Factory as Faker;

class TagTableSeeder extends Seeder
{
    public function run() {
        $faker = Faker::create();

        DB::table('tags')->insert(array(
            'name'          => $faker->sentence(),
            'description'   => $faker->text()
        ));
    }
}