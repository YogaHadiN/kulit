<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group @if($errors->has('name'))has-error @endif">
		  {!! Form::label('name', 'Nama', ['class' => 'control-label']) !!}
			{!! Form::text('name', null, array(
				'class'         => 'form-control rq'
			))!!}
		  @if($errors->has('name'))<code>{{ $errors->first('name') }}</code>@endif
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group @if($errors->has('email'))has-error @endif">
			{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
			{!! Form::text('email', null, array(
				'class'         => 'form-control'
			))!!}
			@if($errors->has('email'))<code>{{ $errors->first('email') }}</code>@endif
		</div>
	</div>
	@if(isset($family))
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group @if($errors->has('hubungan'))has-error @endif">
			{!! Form::label('hubungan', 'Hubungan', ['class' => 'control-label']) !!}
			{!! Form::text('hubungan', null, array(
				'class'         => 'form-control rq'
			))!!}
			@if($errors->has('hubungan'))<code>{{ $errors->first('hubungan') }}</code>@endif
		</div>
	</div>
	@endif
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		@include('users.telp', ['control' => $user])
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group @if($errors->has('gender'))has-error @endif">
			{!! Form::label('gender', 'Jenis Kelamin', ['class' => 'control-label']) !!}
			{!! Form::select('gender', App\Yoga::genderList(), null, array(
				'class'         => 'form-control rq'
			))!!}
			@if($errors->has('gender'))<code>{{ $errors->first('gender') }}</code>@endif
		</div>
	</div>

</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group @if($errors->has('alamat'))has-error @endif">
		  {!! Form::label('alamat', 'Alamat', ['class' => 'control-label']) !!}
			{!! Form::textarea('alamat', null, array(
				'class'         => 'form-control textareacustom rq'
			))!!}
		  @if($errors->has('alamat'))<code>{{ $errors->first('alamat') }}</code>@endif
		</div>
	</div>
</div>
@if(isset($edit_user))
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group @if($errors->has('password'))has-error @endif">
		  {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
			{!! Form::password('password', array(
				'class'         => 'form-control'
			))!!}
		  @if($errors->has('password'))<code>{{ $errors->first('password') }}</code>@endif
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group @if($errors->has('password_confirmation'))has-error @endif">
		  {!! Form::label('password_confirmation', 'Retype Password', ['class' => 'control-label']) !!}
			{!! Form::password('password', array(
				'class'         => 'form-control'
			))!!}
		  @if($errors->has('password_confirmation'))<code>{{ $errors->first('password_confirmation') }}</code>@endif
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<button class="btn btn-success btn-block" type="button" onclick='dummySubmit(this);return false;'>Submit</button>
		{!! Form::submit('Submit', ['class' => 'btn btn-success hide', 'id' => 'submit']) !!}
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<a class="btn btn-danger btn-block" href="{{ url('laporans') }}">Cancel</a>
	</div>
</div>
