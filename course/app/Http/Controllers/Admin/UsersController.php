<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller {

	private $user;

	public function __construct() {
		$this->beforeFilter('@findUser', ['only' => ['show', 'edit', 'update', 'destroy']]);
	}

	public function findUser(Route $route) {
		$this->user = User::findOrFail($route->getParameter('users'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$users = User::name($request->get('name'))->orderBy('id', 'DESC')->paginate(7);
		// dd(DB::getQueryLog());
		// dd($users);

		return view('admin.index', ['users' => $users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		// $data = $request->all();
		// dd($data);

		$user = new User($request->all());
		$user->save();

		// return redirect('admin/users');
		return redirect()->route('admin.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// $user = User::findOrFail($id);
		// return view('admin.edit', ['user' => $user]);
		return view('admin.edit')->with('user', $this->user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request, $id)
	{
		// $user = User::findOrFail($id);
		// $user->fill($request->all());
		// $user->save();
		$this->user->fill($request->all());
		$this->user->save();

		return redirect()->route('admin.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		// dd($id);
		// User::destroy($id);

		// $user = User::findOrFail($id);
		// $user->delete();

		//abort(500);
		$this->user->delete();
		$message = 'El usuario ' . $this->user->full_name . ' fue eliminado';

		if ($request->ajax()) {
			return response()->json([
				'id'		=> $this->user->id,
				'message' 	=> $message,
			]);
		}

		Session::flash('message', $message);

		return redirect()->route('admin.users.index');
	}

}
