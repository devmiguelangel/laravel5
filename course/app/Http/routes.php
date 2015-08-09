<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'users' => 'UsersController'
]);

Route::get('orm', 'UsersController@getOrm');

//Route::get('users', 'UsersController@getIndex');

Route::get('example', function() {
	$user = 'Miguel';

	return view('examples.template', compact('user'));
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin'], 'namespace' => 'Admin'], function() {
	Route:resource('users', 'UsersController');
});