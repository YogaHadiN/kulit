<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Ppds;
use App\Yoga;
use Input;
use DB;

class JadwalsController extends Controller
{
	public function index(){
		$jadwals = Jadwal::all();
		return view('jadwals.index', compact(
			'jadwals'
		));
	}
	public function create(){
		return view('jadwals.create');
	}
	public function edit($id){
		$jadwal = Jadwal::find($id);
		return view('jadwals.edit', compact('jadwal'));
	}
	public function store(Request $request){
		if ($this->valid( Input::all() )) {
			return $this->valid( Input::all() );
		}

		$jadwal                    = new Jadwal;
		$jadwal->ppds_id           = $request->ppds_id;
		$jadwal->jenis_kegiatan_id = $request->jenis_kegiatan_id ;
		$jadwal->waktu              = $request->waktu;
		$jadwal->catatan           = $request->catatan ;
		$jadwal->save();


		$pesan = Yoga::suksesFlash('Jadwal baru berhasil dibuat');
		return redirect('jadwals')->withPesan($pesan);
	}
	public function update($id, Request $request){
		if ($this->valid( Input::all() )) {
			return $this->valid( Input::all() );
		}

		$jadwal                    = Jadwal::find($id);
		$jadwal->ppds_id           = $request->ppds_id;
		$jadwal->jenis_kegiatan_id = $request->jenis_kegiatan_id ;
		$jadwal->waktu             = $request->waktu;
		$jadwal->catatan           = $request->catatan ;
		$jadwal->save();


		$pesan = Yoga::suksesFlash('Jadwal baru berhasil diupdate');
		return redirect('jadwals')->withPesan($pesan);
	}
	public function destroy($id){
		Jadwal::destroy($id);
		$pesan = Yoga::suksesFlash('Jadwal berhasil dihapus');
		return redirect('jadwals')->withPesan($pesan);
	}
	
	private function valid( $data ){
		$messages = [
			'required' => ':attribute Harus Diisi',
		];
		$rules = [
			'ppds_id'           => 'required',
			'jenis_kegiatan_id' => 'required',
			'waktu'              => 'required'
		];
		
		$validator = \Validator::make($data, $rules, $messages);
		
		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}
	}

	
	
}
