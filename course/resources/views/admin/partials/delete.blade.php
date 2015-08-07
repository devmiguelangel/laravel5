{!! Form::open(array('route' => ['admin.users.destroy', $user->id], 'method' => 'DELETE')) !!}
<button type="submit" class="btn btn-danger">Eliminar Usuario</button>
{!! Form::close() !!}