<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalKegiatan;

class JadwalKegiatansController extends Controller
{
	public function index(){
		$jadwal_kegiatans = JadwalKegiatan::all();
		return view('jadwal_kegiatans.index', compact(
			'jadwal_kegiatans'
		));
	}
	
}
