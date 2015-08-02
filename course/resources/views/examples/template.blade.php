@extends('examples.layout')

@section('content')

    <h1>Curso basico de Laravel 5</h1>
    <p>
        @if(isset($user))
            {{ $user }}
        @else
            [Login]
        @endif
    </p>

@endsection