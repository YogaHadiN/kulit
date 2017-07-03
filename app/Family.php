<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    //
    protected $morphClass = 'App\Family';
    public function no_telp(){
        return $this->morphMany('App\NoTelp', 'telponable');
    }
    public function address(){
        return $this->morphMany('App\Address', 'addressable');
    }
	public function user(){
		return $this->belongsTo('App\User');
	}
}
