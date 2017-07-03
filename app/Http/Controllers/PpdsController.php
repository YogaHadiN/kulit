<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ppds;
use Input;
use Excel;
use App\NoTelp;
use App\Yoga;
use DB;

class PpdsController extends Controller
{
    //
	public function index(){
		$ppds = Ppds::all();
		return view('ppds.index', compact(
			'ppds'
		));
	}
	public function import(){
		DB::beginTransaction();
		try {
			$last_id = Ppds::orderBy('id', 'desc')->firstOrFail()->id;
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
					'inisial'    => $result->inisial,
					'created_at' => $timestamp,
					'updated_at' => $timestamp
				];
				$telps = $result->no_telp;
				$telps = explode(',', $telps);
				foreach ($telps as $telp) {
					$no_telps[] = [
						'telponable_id'   => $last_id,
						'telponable_type' => 'App\Ppds',
						'no_telp'         => trim( $telp ),
						'created_at'      => $timestamp,
						'updated_at'      => $timestamp
					];
				}
			}
			Ppds::insert($datas);
			NoTelp::insert($no_telps);
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
		$pesan = Yoga::suksesFlash('Import Data Berhasil');
		return redirect()->back()->withPesan($pesan);
	}
	public function create(){
		return view('ppds.create');
	}
	public function store(Request $request){
		DB::beginTransaction();
		try {
			
			if ( $this->valid( Input::all() ) ) {
				 $this->valid( Input::all() ); 
			}

			$ppds            = new Ppds;
			$ppds->name      = $request->name ;
			$ppds->alamat    = $request->alamat ;
			$ppds->email     = $request->email ;
			$ppds->inisial   = $request->inisial ;
			$ppds->panggilan = $request->panggilan ;
			$ppds->save();


			$no_telps = $request->no_telps;

			$no_telp = [];
			$timestamp = date('Y-m-d H:i:s');
			foreach ($no_telps as $n) {
				$no_telp[] = [
					'no_telp' => $n,
					'telponable_id' => $ppds->id,
					'telponable_type' => 'App\Ppds',
					'created_at' => $timestamp,
					'updated_at' => $timestamp
				];
			}

			NoTelp::insert($no_telp);

			$pesan = Yoga::suksesFlash('Ppds Baru berhasil dibuat');
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
		return redirect('ppds')->withPesan($pesan);
	}
	public function destroy($id){
		$name = Ppds::find($id)->name;
		Ppds::destroy($id);
		NoTelp::where('telponable_type', 'App\Ppds')->where('telponable_id', $id)->delete();
		$pesan = Yoga::suksesFlash('Ppds ' . $name . ' BERHASIL dihapus');
		return redirect()->back()->withPesan($pesan);
	}

	
	private function valid( $data ){
		$messages = [
			'required' => ':attribute Harus Diisi',
		];
		$rules = [
			'name'      => 'required',
			'alamat'    => 'required',
			'inisial'   => 'required',
			'panggilan' => 'required'
		];
		
		$validator = \Validator::make($data, $rules, $messages);
		
		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}
	}
	public function edit($id){
		$ppds = Ppds::find($id);
		return view('ppds.edit', compact(
			'ppds'
		));
	}
	public function update(Request $request, $id){
		DB::beginTransaction();
		try {
			
			if ( $this->valid( Input::all() ) ) {
				 $this->valid( Input::all() ); 
			}

			$ppds            = Ppds::find($id);
			$ppds->name      = $request->name;
			$ppds->alamat    = $request->alamat;
			$ppds->panggilan = $request->panggilan;
			$ppds->inisial   = $request->inisial;
			$ppds->email     = $request->email;
			$ppds->save();

			NoTelp::where('telponable_type', 'App\Ppds')->where('telponable_id', $id)->delete();

			$no_telps = $request->no_telps;

			$timestamp = date('Y-m-d H:i:s');
			$no_telp = [];
			foreach ($no_telps as $telp) {
				$no_telp[] = [
					'telponable_type' => 'App\Ppds',
					'telponable_id' => $ppds->id,
					'no_telp' => $telp,
					'created_at' => $timestamp,
					'updated_at' => $timestamp
				];
			}

			NoTelp::insert($no_telp);

			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
		$pesan = Yoga::suksesFlash('Edit Ppds Berhasil');
		return redirect('ppds')->withPesan($pesan);
	}
	
	
	
	
}
