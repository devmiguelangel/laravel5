@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif


                    <div class="panel-body">
                        {!! Form::model(Request::only('name', 'type'), ['route' => 'admin.users.index', 'method' => 'GET',
                            'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario']) !!}
                            {!! Form::select('type', config('options.types'), null, ['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                        {!! Form::close() !!}

                        <p>
                            <a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">
                                Nuevo Usuario
                            </a>
                        </p>
                    </div>

                    <p class="panel-body">
                        Hay {{ $users->total() }} Usuarios en Total
                    </p>

                    @include('admin.partials.table')

                    {!! $users->appends(Request::all())->render() !!}
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(array('route' => ['admin.users.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete')) !!}
    {!! Form::close() !!}
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-delete').click(function (e) {
            e.preventDefault();

            var id  = $(this).data('row');
            var row = '#u-' + id;
            var url = $('#form-delete').prop('action');
            url = url.replace(':USER_ID', id);

            var data = $('#form-delete').serialize();
            
            $.post(url, data, function (result) {
                $(row).fadeOut();
                alert(result.message);
                console.log(result);
            }).fail(function (err) {
                console.log(err);
                alert('El usuario no puede eliminarse');
            });
        });
    });
</script>
@endsection
