<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoTelp extends Model
{
	public function telponable(){
		return $this->morphto();
	}
}
