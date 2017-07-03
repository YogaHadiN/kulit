@extends('master')

@section('title') 
PPDS DV | JADWAL

@stop
@section('breadcrumb') 
<h2>Jadwal</h2>
<ol class="breadcrumb">
	  <li>
		  <a href="{{ url('/')}}">home</a>
	  </li>
	  <li class="active">
		  <strong>Jadwal</strong>
	  </li>
</ol>
@stop
@section('content') 
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
				<div class="panelLeft">Jadwal</div>
				<div class="panelRight">
					<a class="btn btn-primary" href="{{ url('jadwals/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Buat Jadwal Baru</a>
				</div>
			</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>Ppds</th>
							<th>Jenis Kegiatan</th>
							<th>Waktu</th>
							<th>Catatan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($jadwals->count() > 0)
							@foreach($jadwals as $j)
								<tr>
									<td>{{ $j->ppds->name }}</td>
									<td>{{ $j->jenisKegiatan->jenis_kegiatan }}</td>
									<td>{{ $j->waktu }}</td>
									<td>{{ $j->catatan }}</td>
									<td nowrap class="autofit">
										{!! Form::open(['url' => 'jadwals/' . $j->id, 'method' => 'delete']) !!}
											<a class="btn btn-warning" href="{{ url('jadwals/' . $j->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
											<button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
										{!! Form::close() !!}
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="5">
									{!! Form::open(['url' => 'jadwals/imports', 'method' => 'post', 'files' => 'true']) !!}
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

