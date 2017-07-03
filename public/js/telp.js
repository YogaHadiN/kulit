function tambahTelpLagi(control){
	var no_telp = $(control).closest('.input-group').find('input').val();
	var duplikat = false;
	$('.telpon_hapus').each(function(){
		if ( no_telp == $(this).val() ) {
			duplikat = true;
		}
	});
	if(no_telp == ''){
		alert('Harus isi dulu kolom ini sebelum tambah No Telpon lagi');
		focusInput(control);
		return false;
	} else if ( duplikat ) {
		alert('Nomor yang sama sudah dimasukkan, Jangan memasukkan nomor yang sama');
		$(control).closest('.input-group').find('input').val('');
		focusInput(control);
		return false;
	} else {
		$(control).closest('#no_telp_container')
			.append("<div class='input-group'><input name='no_telps[]' class='form-control' type='text'> <div class='input-group-btn'><button type='button' onclick='tambahTelpLagi(this);return false;' class='btn btn-success btn-block'><strong><span class='glyphicon glyphicon-plus'></span></strong></button></div></div>");
		$(control)
			.removeAttr('class')
			.addClass('btn btn-danger')
			.html('<strong><span class="glyphicon glyphicon-minus"></span></strong>')
			.removeAttr('onclick')
			.attr('onclick', 'hapusTelepon(this);return false;');
		$(control).closest('.input-group').find('input').addClass('telpon_hapus');
		focusInput(control);
	}
}
function hapusTelepon(control){
	focusInput(control);
	$(control).closest('.input-group').remove();
}
function focusInput(control){ 
	$(control).closest('#no_telp_container').find('input').focus();
}
