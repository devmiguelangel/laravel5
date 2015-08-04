@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>

                    <div class="panel-body">
                        Hay {{ $users->total() }} Usuarios en Total
                    </div>

                    <p>
                        <a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">
                            Nuevo Usuario
                        </a>
                    </p>

                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Accion</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type_user }}</td>
                            <td>
                                <a href="#">Editar</a>
                                <a href="#">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
