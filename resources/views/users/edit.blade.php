@extends('master')

@section('title') 
PPDS DV | Edit User

@stop
@section('breadcrumb') 
<h2>Edit User</h2>
<ol class="breadcrumb">
	  <li>
		  <a href="{{ url('/')}}">Home</a>
	  </li>
		<li>
		  <a href="{{ url('users')}}">User</a>
	  </li>
	  <li class="active">
		  <strong>Edit User</strong>
	  </li>
</ol>
@stop
@section('content') 
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Use</h3>
				</div>
				<div class="panel-body">
					{!! Form::model($user,['url' => 'users/' . $user->id, 'method' => 'put']) !!}
						@include('users.form', ['edit_user' => true, 'user' => $user])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panelLeft">Daftar Family</h3>
					<h3 class="panelRight">
						<a class="btn btn-primary" href="{{ url('families/create/' . $user->id) }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Buat Famili Baru</a>
					</h3>
				</div>
				<div class="panel-body">
					@include('users.family_list')
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

