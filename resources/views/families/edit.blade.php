@extends('master')

@section('title') 
	PPDS DV | Edit Family {{ $family->user->name }}
@stop
@section('breadcrumb')
	<h2>Create Family</h2>
	<ol class="breadcrumb">
		<li>
			<a href="{{ url('home') }}">Home</a>
		</li>
		<li>
			<a href="{{ url('users/' . $family->user->id ) }}">{{ $family->user->name }}</a>
		</li>
		<li class="active">
			<strong>Edit Family {{ $family->name }}</strong>
		</li>
	</ol>
@endsection
@section('content') 
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-info">
				<div class="panel-body">
					{!! Form::model($family, ['url' => 'families/' . $family->id, 'method' => 'put']) !!}
						@include('users.form', ['user' => $family, 'family' =>'true'])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop
@section('footer') 
<script src="{{ url('js/telp.js') }}"></script>
<script type="text/javascript" charset="utf-8">
	function dummySubmit(control){
		if(validatePass2(control)){
			$('#submit').click();
		}
	}
</script>
@stop

