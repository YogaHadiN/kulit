@extends('master')

@section('title') 
PPDS DV | Buat Family Baru
@stop
@section('breadcrumb')
	<h2>Create Family</h2>
	<ol class="breadcrumb">
		<li>
			<a href="{{ url('home') }}">Home</a>
		</li>
		<li class="active">
			<strong>Create Family</strong>
		</li>
	</ol>
@endsection
@section('content') 
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-info">
				<div class="panel-body">
					{!! Form::open(['url' => 'families/' . $user->id, 'method' => 'post']) !!}
						@include('users.form', ['user' => null, 'family' =>'true'])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="panelLeft">
						Keluarga {{ $user->name }}
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						@include('users.family_list')
					</div>
					
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

