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
				<div class="panelLeft">
					Terkhir sinkron pada {{ $updated_at->format('d M Y') }} jam {{  $updated_at->format('H:i:s')  }}
				</div>
				<div class="panelRight">
					<a class="btn btn-success" href="{{ url('contact/import/google') }}"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 
						Syncronize Google Contact
					
					</a>
					
				
				</div>
			</h3>
		</div>
		<div class="panel-body">
			<div>
			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#konsulen" aria-controls="konsulen" role="tab" data-toggle="tab">Konsulen</a></li>
				<li role="presentation"><a href="#ppds" aria-controls="ppds" role="tab" data-toggle="tab">Ppds</a></li>
				<li role="presentation"><a href="#lainnya" aria-controls="lainnya" role="tab" data-toggle="tab">Lainnya</a></li>
			  </ul>
			  <!-- Tab panes -->
			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="konsulen">
					@include('google.form', ['kontak' => $konsulen])
				</div>
				<div role="tabpanel" class="tab-pane" id="ppds">
					@include('google.form', ['kontak' => $ppds])
				</div>
				<div role="tabpanel" class="tab-pane" id="lainnya">
					@include('google.form', ['kontak' => $lainnya])
				</div>
			  </div>
			</div>
		</div>
	</div>
@stop
@section('footer') 
@stop
