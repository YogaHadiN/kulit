@extends('master')
@section('title')
	PPDS KULIT UNDIP | Format SMS INFO
@endsection
@section('breadcrumb')
	<h2>Home</h2>
	<ol class="breadcrumb">
		<li>
			<a href="{{ url('home') }}">Home</a>
		</li>
		<li class="active">
			<strong>Format SMS INFO</strong>
		</li>
	</ol>
@endsection
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<div class="panelLeft">
					Format SMS INFO
				</div>
				<div class="panelRight">
					<a class="btn btn-primary" href="{{ url('sms_infos/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Format SMS</a>
				</div>
			</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>Judul SMS</th>
							<th>Isi SMS</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($format_sms->count() > 0)
							@foreach($format_sms as $p)
								<tr>
									<td>{{ $p->title }}</td>
									<td>{!! $p->isi_sms !!}</td>
									<td nowrap class="autofit">
										{!! Form::open(['url' => 'formas_sms/' . $p->id, 'method' => 'delete']) !!}
											<a class="btn btn-warning" href="{{ url('formas_sms/' . $p->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
											<button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
										{!! Form::close() !!}
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="3">
									{!! Form::open(['url' => 'formas_sms/imports', 'method' => 'post', 'files' => 'true']) !!}
										<div class="form-group">
											{!! Form::label('file', 'Data tidak ditemukan, upload data?') !!}
											{!! Form::file('file') !!}
											{!! Form::submit('Upload', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
										</div>
									{!! Form::close() !!}
								</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('footer')
@endsection
