<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $morphClass = 'App\Staf';
    public function no_telp(){
        return $this->morphMany('App\NoTelp', 'telponable');
    }
}
