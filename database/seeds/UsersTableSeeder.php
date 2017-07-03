<?php

use Illuminate\Database\Seeder;
use App\NoTelp;
use App\User;
use App\Address;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user           = new User;
		$user->name     = 'Yoga Hadi Nugroho' ;
		$user->email    = 'yoga_email@yahoo.com' ;
		$user->avatar   = 'img/rsz_avatar_male.png';
		$user->gender   = 1;
		$user->password = bcrypt('Yogaman89');
		$user->save();

		$no_telp                  = new NoTelp;
		$no_telp->no_telp         = '081381912803' ;
		$no_telp->telponable_type = 'App\User' ;
		$no_telp->telponable_id   = $user->id ;
		$no_telp->save();

		$alamat                   = new Address;
		$alamat->address           = '081381912803' ;
		$alamat->addressable_type = 'App\User' ;
		$alamat->addressable_id   = $user->id ;
		$alamat->save();

    }
}
