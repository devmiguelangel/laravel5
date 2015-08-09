<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'email', 'password', 'type'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public static function findAndPaginate($name, $type)
	{
		return User::name($name)
			->type($type)
			->orderBy('id', 'DESC')
			->paginate(7);
	}

	public function profile() {
		// $this->hasOne('App\UserProfile');
		return $this->hasOne('App\UserProfile', 'user_id', 'id');
	}

	/*public function getFullNameAttribute() {
		return $this->first_name . ' ' . $this->last_name;
	}*/

	public function getTypeUserAttribute() {
		$type_user = [
			'admin'	=> 'Administrador',
			'user'	=> 'Usuario',
		];

		return $type_user[$this->type];
	}

	public function setPasswordAttribute($value) {
		if (!empty($value)) {
			return $this->attributes['password'] = Hash::make($value);
		}
	}

	public function scopeName($query, $name)
	{
		if (!empty($name)) {
			// dd($name);
			return $query->where('full_name', 'LIKE', "%$name%");
		}
	}

	public function scopeType($query, $type)
	{
		if (!empty($type)) {
			return $query->where('type', $type);
		}
	}

	public function isAdmin()
	{
		return $this->type === 'admin';
	}

	public function save(array $options = array()) {
		$this->full_name = $this->first_name . ' ' . $this->last_name;
		parent::save();
	}

}
