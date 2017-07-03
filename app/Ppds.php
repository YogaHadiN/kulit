<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppds extends Model
{
    protected $morphClass = 'App\Ppds';
    public function no_telp(){
        return $this->morphMany('App\NoTelp', 'telponable');
    }
	public static function list(){
		return array('' => '- Pilih Ppds -') + Ppds::pluck('name', 'id')->all();
	}
}
