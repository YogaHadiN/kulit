<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use Input;
use App\Yoga;
use DB;

class TestController extends Controller
{
	use App\Jadwal;
	use Input;
	use App\Yoga;
	use DB;
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
		$jadwal       = new Jadwal;
		// Edit disini untuk simpan data
		$jadwal->save();
		$pesan = Yoga::suksesFlash('Jadwal baru berhasil dibuat');
		return redirect('jadwals')->withPesan($pesan);
	}
	public function update($id, Request $request){
		if ($this->valid( Input::all() )) {
			return $this->valid( Input::all() );
		}
		$jadwal     = Jadwal::find($id);
		// Edit disini untuk simpan data
		$jadwal->save();
		$pesan = Yoga::suksesFlash('Jadwal berhasil diupdate');
		return redirect('jadwals')->withPesan($pesan);
	}
	public function destroy($id){
		Jadwal::destroy($id);
		$pesan = Yoga::suksesFlash('Jadwal berhasil dihapus');
		return redirect('jadwals')->withPesan($pesan);
	}
	public function import(){
		return 'Not Yet Handled';
		$file      = Input::file('file');
		$file_name = $file->getClientOriginalName();
		$file->move('files', $file_name);
		$results   = Excel::load('files/' . $file_name, function($reader){
			$reader->all();
		})->get();
		$jadwals     = [];
		$timestamp = date('Y-m-d H:i:s');
		foreach ($results as $result) {
			$jadwals[] = [
	
				// Do insert here
	
				'created_at' => $timestamp,
				'updated_at' => $timestamp
			];
		}
		Jadwal::insert($jadwals);
		$pesan = Yoga::suksesFlash('Import Data Berhasil');
		return redirect()->back()->withPesan($pesan);
	}
	private function valid( $data ){
		$messages = [
			'required' => ':attribute Harus Diisi',
		];
		$rules = [
			'name'           => 'required',
			'alamat'           => 'required',
			'email'           => 'required|email'
		];
		$validator = \Validator::make($data, $rules, $messages);
		
		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}
	}
}
