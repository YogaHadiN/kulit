@extends('master')
@section('title')
	PPDS KULIT UNDIP | Dashboard
@endsection
@section('breadcrumb')
	<h2>Home</h2>
	<ol class="breadcrumb">
		{{-- <li> --}}
		{{-- 	<a href="index.html">Home</a> --}}
		{{-- </li> --}}
		<li class="active">
			<strong>Home</strong>
		</li>
	</ol>
@endsection
@section('content')
	<h2>Haloo Apa Kabar {{ ucfirst( $user->name ) }}</h2>
	@if( empty( $user->alamat ) || empty( $user->no_telp ))
		<div class="alert alert-danger">
			<h3>PERHATIAN</h3>
			<p>Data-data Anda belum lengkap, harap isi dahulu <a class="" href="{{ url('users/' . $user->id  . '/edit') }}">Klik Disini</a> </p>
		</div>
	@endif
	<div class="row">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panelLeft">
						<h3>Data Peserta PPDS</h3>
					</div>
					<div class="panelRight">
						<a class="btn btn-info" href="{{ url('users/' . $user->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit Data</a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-condensed table-bordered">
							<tbody>
								<tr>
									<td>Nama</td>
									<td>{{ $user->name }}</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>{{ $user->alamat }}</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>{{ $user->email }}</td>
								</tr>
								<tr>
									<td>No Telp</td>
									<td>
										@if( $user->no_telp->count() > 0 )
											<ul>
												@foreach($user->no_telp as $telp)	
													<li>{{ $telp->no_telp }}</li>
												@endforeach
											</ul>
										@else
											Belum Ada Data Nomor Telepon
										@endif
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panelLeft">
						<h3>Data Family</h3>
					</div>
					<div class="panelRight">
						<a class="btn btn-info" href="{{ url('families/create/' . $user->id ) }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Family Baru</a>
					</div>
				</div>
				<div class="panel-body">
					@include('users.family_list')
					
				</div>
			</div>
		</div>
	</div>
@endsection
