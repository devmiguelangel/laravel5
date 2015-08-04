@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>

                    {!! Form::open(['route' => 'admin.users.store']) !!}
                    <div class="form-group">
                        {!! Form::label('first_name', 'Nombres') !!}
                        {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('last_name', 'Apellidos') !!}
                        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('type', 'Tipo') !!}
                        {!! Form::select('type',
                            ['' => 'Seleccione...', 'admin' => 'Administrador', 'user' => 'Usuario'],
                            null, ['class' => 'form-control']) !!}
                    </div>

                    <button type="submit" class="btn btn-success">Registrar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
