<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
	public function ppds(){
		return $this->belongsTo('App\Ppds');
	}
	public function jenisKegiatan(){
		return $this->belongsTo('App\JenisKegiatan');
	}
}
