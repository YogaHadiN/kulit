<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormatSms extends Model
{
	public function sms_lines(){
		return $this->hasMany('App\SmsLine');
	}
	public function getIsiSmsAttribute(){
		$sms_lines = $this->sms_lines;
		$text ='';
		foreach ($sms_lines as $s) {
			$text .= $s->sms . '<br />';
		}

		return $text;
	}
	
}
