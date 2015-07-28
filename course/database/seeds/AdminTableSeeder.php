<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{

    public function run() {
        DB::table('users')->insert(array(
            'first_name'    => 'Miguel',
            'last_name'     => 'MG',
            'email'         => 'djmiguelarango@gmail.com',
            'password'      => Hash::make('secret'),
            'type'          => 'admin'
        ));
    }
}