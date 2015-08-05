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