@extends('auth.master')
@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">IN+</h1>
            </div>
            <h3>Register to IN+</h3>
            <p>Create account to see it in action.</p>
			{!! Form::open(['url' => 'register', 'method' => 'post']) !!}
				<div class="form-group @if($errors->has('name'))has-error @endif">
					{!! Form::text('name', null, array(
						'class'         => 'form-control rq',
						'placeholder'         => 'Name'
					))!!}
					@if($errors->has('name'))<code>{{ $errors->first('name') }}</code>@endif
				</div>

				<div class="form-group @if($errors->has('email'))has-error @endif">
					{!! Form::text('email', null, array(
						'class'         => 'form-control rq',
						'placeholder'         => 'Email'
					))!!}
					@if($errors->has('email'))<code>{{ $errors->first('email') }}</code>@endif
				</div>
				<div class="form-group @if($errors->has('gender'))has-error @endif">
					{!! Form::select('gender', App\Yoga::genderList(), null, array(
						'class'         => 'form-control rq',
						'placeholder'         => 'Gender',
					))!!}
					@if($errors->has('gender'))<code>{{ $errors->first('gender') }}</code>@endif
				</div>
				<div class="form-group @if($errors->has('password'))has-error @endif">
					{!! Form::password('password', array(
						'class'         => 'form-control rq',
						'placeholder'         => 'Password'
					))!!}
					@if($errors->has('password'))<code>{{ $errors->first('password') }}</code>@endif
				</div>
				<div class="form-group @if($errors->has('password_confirmation'))has-error @endif">
					{!! Form::password('password_confirmation', array(
						'class'         => 'form-control rq',
						'placeholder'         => 'Retype Password'
					))!!}
					@if($errors->has('password_confirmation'))<code>{{ $errors->first('password_confirmation') }}</code>@endif
				</div>
				<button type="submit" class="btn btn-primary block full-width m-b">Register</button>

				<p class="text-muted text-center"><small>Already have an account?</small></p>
				<a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Login</a>

				<p class="m-t"> <small>PPDS Dermatovenerologi &copy; 2017</small> </p>
				
			{!! Form::close() !!}
        </div>
    </div>
@endsection
@section('footer')
@endsection
