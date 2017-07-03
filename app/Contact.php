<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $morphClass = 'App\Contact';
    protected $dates = ['created_at', 'updated_at'];
    public function address(){
        return $this->morphMany('App\Address', 'addressable');
    }
    public function no_telp(){
        return $this->morphMany('App\NoTelp', 'telponable');
    }
}
