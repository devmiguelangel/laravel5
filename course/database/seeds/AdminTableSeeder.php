<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{

    public function run() {
        $id = DB::table('users')->insertGetId(array(
            'first_name'    => 'Miguel',
            'last_name'     => 'MG',
            'email'         => 'djmiguelarango@gmail.com',
            'password'      => Hash::make('secret'),
            'type'          => 'admin'
        ));

        DB::table('user_profiles')->insert(array(
            'user_id'   => $id,
            'biography' => 'DJ Producer/Remixer',
            'twitter'   => 'http://www.twitter.com/djmiguelarango',
            'website'   => 'http://www.djmiguelarango.com',
            'birthdate' => '1988-03-07'
        ));
    }
}