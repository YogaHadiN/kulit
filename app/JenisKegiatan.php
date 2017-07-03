<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
	public static function list(){
		return [ '-pilih-' ] + JenisKegiatan::pluck('jenis_kegiatan')->all();
	}
	
}
