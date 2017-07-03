<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group @if($errors->has('ppds_id'))has-error @endif">
		  {!! Form::label('ppds_id', 'Ppds', ['class' => 'control-label']) !!}
			{!! Form::select('ppds_id', App\Ppds::list(), null, array(
				'class'         => 'form-control rq'
			))!!}
		  @if($errors->has('ppds_id'))<code>{{ $errors->first('ppds_id') }}</code>@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group @if($errors->has('jenis_kegiatan_id'))has-error @endif">
		  {!! Form::label('jenis_kegiatan_id', 'Jenis Kegiatan', ['class' => 'control-label']) !!}
			{!! Form::select('jenis_kegiatan_id', App\JenisKegiatan::list(), null, array(
				'class'         => 'form-control rq'
			))!!}
		  @if($errors->has('jenis_kegiatan_id'))<code>{{ $errors->first('jenis_kegiatan_id') }}</code>@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group @if($errors->has('waktu'))has-error @endif">
		  {!! Form::label('waktu', 'Waktu', ['class' => 'control-label']) !!}
			{!! Form::text('waktu', null, array(
				'class'         => 'form-control tanggal rq'
			))!!}
		  @if($errors->has('waktu'))<code>{{ $errors->first('waktu') }}</code>@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group @if($errors->has('catatan'))has-error @endif">
		  {!! Form::label('catatan', 'Catatan', ['class' => 'control-label']) !!}
			{!! Form::textarea('catatan', null, array(
				'class'         => 'form-control textareacustom'
			))!!}
		  @if($errors->has('catatan'))<code>{{ $errors->first('catatan') }}</code>@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<button class="btn btn-success btn-block" type="button" onclick='dummySubmit(this);return false;'>Submit</button>
		{!! Form::submit('Submit', ['class' => 'btn btn-success hide', 'id' => 'submit']) !!}
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<a class="btn btn-danger btn-block" href="{{ url('laporans') }}">Cancel</a>
	</div>
</div>
