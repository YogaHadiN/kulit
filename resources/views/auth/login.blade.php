@extends('auth.master')
@section('content')
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '317405622046999',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div class="middle-box text-center loginscreen  animated fadeInDown">
	<div>
		<div>

			<h1 class="logo-name">DV+</h1>

		</div>
		<h3>Welcome PPDS DV</h3>
		<p>Silahkan LOGIN terlebih dahulu</p>
		{!! Form::open(['url' => 'login', 'method' => 'post']) !!}
			<div class="form-group @if($errors->has('email'))has-error @endif">
				{!! Form::text('email', null, array(
					'class'         => 'form-control rq',
					'placeholder'         => 'Email'
				))!!}
				@if($errors->has('email'))<code>{{ $errors->first('email') }}</code>@endif
			</div>
			<div class="form-group @if($errors->has('password'))has-error @endif">
				{!! Form::password('password',array(
					'class'         => 'form-control rq',
					'placeholder'         => 'Password'
				))!!}
				@if($errors->has('password'))<code>{{ $errors->first('password') }}</code>@endif
			</div>
			

			{!! Form::submit('Submit', ['class' => 'btn btn-primary block full-width m-b', 'id' => 'submit']) !!}
		{!! Form::close() !!}


		<a href="#"><small>Forgot password?</small></a>
		<p class="text-muted text-center"><small>Do not have an account?</small></p>
		<a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Create an account</a>
		<br />
		<a class="btn btn-block btn-social btn-facebook" href="{{ url('login/facebook') }}">
			<span class="fa fa-facebook"></span> Masuk Menggunakan Facebook
	    </a>
		
		<p class="m-t"> <small>Aplikasi PPDS DV UNDIP</small> </p>
	</div>
</div>

@endsection
@section('footer')
@endsection
