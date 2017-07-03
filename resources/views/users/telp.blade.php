<div class="form-group @if($errors->has('no_telp'))has-error @endif">
	{!! Form::label('no_telp', 'Nomor Telepon', ['class' => 'control-label']) !!}
	<div id="no_telp_container">
		@if( isset($control))
			@if($control->no_telp->count() > 0 )
			  @foreach( $control->no_telp as $key => $telp )
				  @if( $key == count( $control->no_telp ) -1 )
					  @include('users.telp_kosong', ['telp' => $telp->no_telp])
				  @else
					  @include('users.telp_hapus', ['telp' => $telp->no_telp])
				  @endif
			  @endforeach
		    @else
			  @include('users.telp_kosong')
		    @endif
		@else
		  @include('users.telp_kosong')
		@endif
	</div>
	@if($errors->has('no_telp'))<code>{{ $errors->first('no_telp') }}</code>@endif
</div>
