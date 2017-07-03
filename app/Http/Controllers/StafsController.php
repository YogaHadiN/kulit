<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staf;
use App\Yoga;
use App\NoTelp;
use Input;
use Excel;
use DB;

class StafsController extends Controller
{
    //
	public function index(){
		$stafs = Staf::all();
		return view('stafs.index', compact(
			'stafs'
		));
	}
	public function create(){
		return view('stafs.create');
		
	}
	public function store(Request $request){
		DB::beginTransaction();
		try {
			
			if ($this->valid( Input::all() )) {
				return $this->valid( Input::all() );
			}
			$staf            = new Staf;
			$staf->name      = $request->name;
			$staf->alamat    = $request->alamat;
			$staf->panggilan = $request->panggilan;
			$staf->email     = $request->email;
			$staf->save();


			$no_telps = $request->no_telps;
			$timestamp = date('Y-m-d H:i:s');
			$no_telp = [];
			foreach ($no_telps as $telp) {
				$no_telp[] = [
					'telponable_type' => 'App\Staf',
					'telponable_id' => $staf->id,
					'no_telp' => $telp,
					'created_at' => $timestamp,
					'updated_at' => $timestamp
				];
			}

			NoTelp::insert($no_telp);

			$pesan = Yoga::suksesFlash('Staf baru berhasil dibuat');
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
		return redirect('stafs')->withPesan($pesan);
	}
	public function update(Request $request, $id){
		DB::beginTransaction();
		try {
			
			if ($this->valid( Input::all() )) {
				$this->valid( Input::all() );
			}
			$staf            = Staf::find($id);
			$staf->name      = $request->name;
			$staf->alamat    = $request->alamat;
			$staf->panggilan = $request->panggilan;
			$staf->email     = $request->email;
			$staf->save();

			NoTelp::where('telponable_type', 'App\Staf')->where('telponable_id', $id)->delete();

			$no_telps  = $request->no_telps;
			$timestamp = date('Y-m-d H:i:s');
			$no_telp   = [];
			foreach ($no_telps as $telp) {
				$no_telp[] = [
					'telponable_type' => 'App\Staf',
					'telponable_id'   => $staf->id,
					'no_telp'         => $telp,
					'created_at'      => $staf->created_at,
					'updated_at'      => $timestamp
				];
			}

			NoTelp::insert($no_telp);

			$pesan = Yoga::suksesFlash('Staf baru berhasil diubah');
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
		return redirect('stafs')->withPesan($pesan);
	}
	public function destroy($id){
		$staf_name = Staf::find($id)->name;
		Staf::destroy($id);
		NoTelp::where('telponable_type', 'App\Staf')->where('telponable_id', $id)->delete();
		$pesan = Yoga::suksesFlash('Staf ' . $staf_name . ' BERHASIL dihapus');
		return redirect('stafs')->withPesan($pesan);
	}
	public function edit($id){
		$staf = Staf::find($id);
		return view('stafs.edit', compact(
			'staf'
		));
	}
	public function import(){
		
		DB::beginTransaction();
		try {
			$last_id = Staf::orderBy('id', 'desc')->firstOrFail()->id;
		} catch (\Exception $e) {
			$last_id = 0;
		}
		try {
			$file      = Input::file('file');
			$file_name = $file->getClientOriginalName();
			$file->move('files', $file_name);
			$results   = Excel::load('files/' . $file_name, function($reader){
				$reader->all();
			})->get();
			$no_telps  = [];
			$datas     = [];
			$timestamp = date('Y-m-d H:i:s');
			foreach ($results as $result) {
				$last_id++;
				$datas[] = [
					'id'         => $last_id,
					'name'       => ucwords(strtolower(  $result->name  )),
					'alamat'     => $result->alamat,
					'email'      => $result->email,
					'panggilan'  => $result->panggilan,
					'created_at' => $timestamp,
					'updated_at' => $timestamp
				];
				$telps = $result->no_telp;
				$telps = explode(',', $telps);
				foreach ($telps as $telp) {
					$no_telps[] = [
						'telponable_id'   => $last_id,
						'telponable_type' => 'App\Staf',
						'no_telp'         => trim( $telp ),
						'created_at'      => $timestamp,
						'updated_at'      => $timestamp
					];
				}
			}
			Staf::insert($datas);
			NoTelp::insert($no_telps);
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
		$pesan = Yoga::suksesFlash('Import Data Berhasil');
		return redirect()->back()->withPesan($pesan);
	}
	
	
	
	private function valid( $data ){
		$messages = [
			'required' => ':attribute Harus Diisi',
		];
		$rules = [
			'name' => 'required',
			'alamat' => 'required',
			'panggilan' => 'required'
		];
		
		$validator = \Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}
	}
	
	
	
	
}
