<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function getIndex() {
        $users = DB::table('users')
            ->select([
                'users.id',
                'first_name',
                'last_name',
                'user_profiles.twitter',
                'user_profiles.id as profile_id'])
            ->leftJoin('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->where('first_name', '!=', 'miguel')
            ->orderBy('first_name', 'ASC')
            ->get();

        dd($users);

        return $users;
    }
}