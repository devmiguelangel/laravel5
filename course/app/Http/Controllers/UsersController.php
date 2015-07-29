<?php namespace App\Http\Controllers;


use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function getOrm() {
        $users = User::select('id', 'first_name', 'last_name')
            ->with('profile')
            ->orderBy('first_name', 'asc')
            ->get();

        dd($users->toArray());
        // dd($users->full_name);
        // dd($users->profile->age);
    }

    public function getIndex() {
        $users = DB::table('users')
            ->select([
                'users.id',
                'first_name',
                'last_name',
                'birthdate',
                'user_profiles.twitter',
                'user_profiles.id as profile_id'])
            ->leftJoin('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->where('first_name', '!=', 'miguel')
            ->orderBy('first_name', 'ASC')
            ->get();

        foreach ($users as $row) {
            $row->full_name = $row->first_name . ' ' . $row->last_name;
            $row->age = Carbon::parse($row->birthdate)->age;
        }

        dd($users);

        return $users;
    }
}