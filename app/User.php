<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
		'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	public function families(){
		return $this->hasMany('App\Family');
	}
    protected $morphClass = 'App\User';
    public function no_telp(){
        return $this->morphMany('App\NoTelp', 'telponable');
    }
    public function address(){
        return $this->morphMany('App\Address', 'addressable');
    }
    public function family(){
        return $this->hasMany('App\Family');
    }
	public function getThisAvatarAttribute(){
		if ( 
			$this->avatar == 'img/rsz_avatar_male.png' ||
			$this->avatar == 'img/rsz_avatar_female.png'
	   	) {
			return url( $this->avatar );
		} else {
			return $this->avatar;
		}
	}
}
