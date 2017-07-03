@extends('master')

@section('title') 
PPDS DV | EDIT JADWAL BARU	

@stop
@section('breadcrumb') 
<h2>Edit Jadual</h2>
<ol class="breadcrumb">
	  <li>
		  <a href="{{ url('/')}}">home</a>
	  </li>
	  <li class="active">
		  <strong>Edit Jadual</strong>
	  </li>
</ol>
@stop
@section('content') 
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						<div class="panelLeft">Edit Jadual</div>
					</h3>
				</div>
				<div class="panel-body">
					{!! Form::model($jadwal, ['url' => 'jadwals/' . $jadwal->id, 'method' => 'put']) !!}
						@include('jadwals.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop
@section('footer') 
	<script type="text/javascript" charset="utf-8">
		function dummySubmit(control){
			if(validatePass2(control)){
				$('#submit').click();
			}
		}
	</script>
@stop

