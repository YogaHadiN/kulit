@extends('master')
@section('title')
	PPDS KULIT UNDIP | Buat Format SMS INFO Baru
@endsection
@section('breadcrumb')
	<h2>Home</h2>
	<ol class="breadcrumb">
		<li>
			<a href="{{ url('home') }}">Home</a>
		</li>
		<li>
			<a href="{{ url('sms_infos') }}">SMS INFO</a>
		</li>
		<li class="active">
			<strong>Buat Format SMS INFO Baru</strong>
		</li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						<div class="panelLeft">Buat Format SMS INFO Baru</div>
					</h3>
				</div>
				<div class="panel-body">
					{!! Form::open(['url' => 'sms_infos', 'method' => 'post']) !!}
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group @if($errors->has('title'))has-error @endif">
								  {!! Form::label('title', 'Judul SMS', ['class' => 'control-label']) !!}
									{!! Form::text('title', null, array(
										'class'         => 'form-control rq'
									))!!}
								  @if($errors->has('title'))<code>{{ $errors->first('title') }}</code>@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group @if($errors->has('sms'))has-error @endif">
								  {!! Form::label('sms', 'Isi SMS', ['class' => 'control-label']) !!}
									{!! Form::textarea('sms', null, array(
										'class'         => 'form-control rq textareacustom'
									))!!}
								  @if($errors->has('sms'))<code>{{ $errors->first('sms') }}</code>@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<button class="btn btn-success btn-block" type="button" onclick='dummySubmit(this);return false;'>Submit</button>
								{!! Form::submit('Submit', ['class' => 'btn btn-success hide', 'id' => 'submit']) !!}
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<a class="btn btn-danger btn-block" href="{{ url('home') }}">Cancel</a>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	<script type="text/javascript" charset="utf-8">
		function dummySubmit(control){
			if(validatePass2(control)){
				$('#submit').click();
			}
		}
	</script>
@endsection
