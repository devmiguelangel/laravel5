@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::open(['route' => 'admin.users.store']) !!}

                    @include('admin.partials.fields')

                    <button type="submit" class="btn btn-success">Registrar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
