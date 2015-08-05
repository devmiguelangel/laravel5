@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>

                    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}

                    @include('admin.partials.fields')

                    <button type="submit" class="btn btn-success">Actualizar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
