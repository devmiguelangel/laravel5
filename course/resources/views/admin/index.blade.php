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
                        Hay {{ $users->total() }} Usuarios en Total
                    </div>

                    <p>
                        <a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">
                            Nuevo Usuario
                        </a>
                    </p>

                    @include('admin.partials.table')

                    {!! $users->render() !!}
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
