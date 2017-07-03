@extends('master')

@section('title') 
PPDS DV | Contact

@stop
@section('breadcrumb') 
<h2>Contact</h2>
<ol class="breadcrumb">
	  <li>
		  <a href="{{ url('home')}}">home</a>
	  </li>
	  <li class="active">
		  <strong>Contact</strong>
	  </li>
</ol>
@stop
@section('content') 
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
				<div class="panelLeft">Contact</div>
				<div class="panelRight">
					<a class="btn btn-primary" href="{{ url('contacts/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Buat Contact Baru</a>
				</div>
			</h3>
		</div>
		<div class="panel-body">
			
		</div>
	</div>
@stop
@section('footer') 
@stop
