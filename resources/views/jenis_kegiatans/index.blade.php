@extends('master')

@section('title') 
PPDS DV | Jenis Kegiatan

@stop
@section('breadcrumb') 
<h2>Jenis Kegiatan</h2>
<ol class="breadcrumb">
	  <li>
		  <a href="{{ url('home')}}">home</a>
	  </li>
	  <li class="active">
		  <strong>Jenis Kegiatan</strong>
	  </li>
</ol>
@stop
@section('content') 
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
				<div class="panelLeft">Jenis Kegiatan</div>
				<div class="panelRight">
					<a class="btn btn-primary" href="{{ url('jenis_kegiatans/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Buat Jenis Kegiatan Baru</a>
				</div>
			</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nama Kegiatan</th>
						</tr>
					</thead>
					<tbody>
						@if($jenis_kegiatans->count() > 0)
							@foreach($jenis_kegiatans as $jenis_kegiatan)
								<tr>
									<td>{{ $jenis_kegiatan->jenis_kegiatan }}</td>
									<td nowrap class="autofit">
										{!! Form::open(['url' => 'jenis_kegiatans/' . $jenis_kegiatan->id, 'method' => 'delete']) !!}
											<a class="btn btn-warning btn-sm" href="{{ url('jenis_kegiatans/' . $jenis_kegiatan->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
											<button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus {{ $jenis_kegiatan->id }} - {{ $jenis_kegiatan->jenis_kegiatan }} ?')" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
										{!! Form::close() !!}
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="">
									{!! Form::open(['url' => 'jenis_kegiatans/imports', 'method' => 'post', 'files' => 'true']) !!}
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
@stop
@section('footer') 
@stop
