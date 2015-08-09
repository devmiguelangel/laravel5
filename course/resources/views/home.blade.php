@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				@if(Session::has('mess_admin'))
				<div class="alert alert-warning" role="alert">
					{{ Session::get('mess_admin') }}
				</div>
				@endif

				<div class="panel-body">
					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
