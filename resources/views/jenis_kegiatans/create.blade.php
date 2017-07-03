@extends('master')

@section('title') 
PPDS DV | Daftar Staf

@stop
@section('breadcrumb') 
<h2>Daftar Staf</h2>
<ol class="breadcrumb">
	  <li>
		  <a href="{{ url('/')}}">Home</a>
	  </li>
	<li>
		  <a href="{{ url('jenis_kegiatans')}}">Kegiatan</a>
	  </li>
	  <li class="active">
		  <strong>Tambah Kegiatan</strong>
	  </li>
</ol>
@stop
@section('content') 
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
				<div class="panelLeft">Daftar Staf</div>
				<div class="panelRight">
					<a class="btn btn-primary" href="{{ url('stafs/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Buat Staf Baru</a>
				</div>
			</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Email</th>
							<th>No Telp</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($stafs->count() > 0)
							@foreach($stafs as $p)
								<tr>
									<td>{{ $p->name }}</td>
									<td>{{ $p->alamat }}</td>
									<td>{{ $p->email }}</td>
									<td>
										<ul>
											@foreach($p->no_telp as $telp)
												<li>{{ $telp->no_telp }}</li>
											@endforeach
										</ul>
									</td>
									<td nowrap class="autofit">
										{!! Form::open(['url' => 'stafs/' . $p->id, 'method' => 'delete']) !!}
											<a class="btn btn-warning" href="{{ url('stafs/' . $p->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
											<button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?'); return false;" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
										{!! Form::close() !!}
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="5">
									{!! Form::open(['url' => 'stafs/imports', 'method' => 'post', 'files' => 'true']) !!}
										<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
											{!! Form::label('file', 'Data tidak ditemukan, upload data?') !!}
											{!! Form::file('file') !!}
											{!! Form::submit('Upload', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
											{!! $errors->first('file', '<p class="help-block">:message</p>') !!}
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

