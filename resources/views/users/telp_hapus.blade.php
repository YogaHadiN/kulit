<div class="input-group">
	{!! Form::text('no_telps[]', $telp, array(
		'class'         => 'form-control telpon_hapus rq'
	))!!}
	 <div class="input-group-btn">
		 <button class="btn btn-danger btn-block" type="button" onclick="hapusTelepon(this);return false;">
			 <strong>
				 <span class="glyphicon glyphicon-minus"></span>
			 </strong>
		 </button>
	 </div>
</div>
