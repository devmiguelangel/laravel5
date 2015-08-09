<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Session;

class IsAdmin {

	/**
	 * @var Guard
	 */
	private $auth;

	public function __construct(Guard $auth)
	{

		$this->auth = $auth;
	}

	public function handle($request, Closure $next)
	{
		// dd($this->auth->user());

		if (!$this->auth->user()->isAdmin()) {

			if ($request->ajax()) {
				return response('Unauthorized.', 401);
			} else {
				Session::flash('mess_admin', 'Usted no tiene permisos');
				return redirect()->to('home');
			}
		}

		return $next($request);
	}

}
