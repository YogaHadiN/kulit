<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Family;
use App\NoTelp;
use App\Yoga;
use Input;
use DB;

class FamiliesController extends Controller
{
	public function create($id){
		$user = User::find($id);
		return view('families.create', compact('user'));
	}
	public function store($id, Request $request){
		if ($this->valid(Input::all())) {
			return $this->valid(Input::all());
		}

		$f           = new Family;
		$f->name     = $request->name;
		$f->alamat   = $request->alamat;
		$f->hubungan = $request->hubungan;
		$f->email    = $request->email;
		$f->user_id  = $id;
		$f->save();

		if (count($request->no_telps) > 0) {
			$no_telps = [];
			$timestamp = date('Y-m-d H:i:s');
			foreach ($request->no_telps as $telp) {
				if (!empty(trim( $telp ))) {
					$no_telps[] = [
						'telponable_type' => 'App\Family',
						'telponable_id'   => $f->id,
						'no_telp'         => $telp,
						'created_at'      => $timestamp,
						'updated_at'      => $timestamp
					];
				}
			}
			NoTelp::insert($no_telps);
			
		}
		$pesan = Yoga::suksesFlash('Family Baru Berhasil Dibuat');
		return redirect('home')->withPesan($pesan);
	}

	private function valid($data){
		$messages = [
			'required' => ':attribute Harus Diisi',
		];
		$rules = [
			'name'   => 'required',
			'email'  => 'email|nullable',
			'alamat' => 'required'
		];
		
		$validator = \Validator::make($data, $rules, $messages);
		
		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}
	}
	public function edit($id){
		$family = Family::with('no_telp', 'user')
						->where('id', $id)
						->first();
		return view('families.edit', compact(
			'family'
		));
	}
	public function update($id){
		if ($this->valid( Input::all() )) {
			return $this->valid( Input::all() );
		}
		DB::beginTransaction();
		try {
			// update family
			$family           = Family::find($id);
			$family->name     = Input::get('name');
			$family->alamat   = Input::get('alamat');
			$family->hubungan = Input::get('hubungan');
			$family->email    = Input::get('email');
			$family->save();


			// hapus family yang sudah ada
			NoTelp::where('telponable_type', 'App\Family')
					->where('telponable_id', $id)
					->delete();

			// Insert array no telp di NoTelp
			if ( count( Input::get('no_telps') ) ) {
				$no_telps = [];
				$timestamp = date('Y-m-d H:i:s');
				foreach ( Input::get('no_telps') as $telp) {
					$no_telps[] = [
						'telponable_type' => 'App\Family',
						'telponable_id'   => $id,
						'no_telp'         => $telp,
						'created_at'      => $timestamp,
						'updated_at'      => $timestamp
					];
				}
				NoTelp::insert( $no_telps );
			}

			//bila sukses
			$pesan = Yoga::suksesFlash('Family berhasil diubah');
			DB::commit();
			return redirect('home')->withPesan($pesan);
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
		//validate before proceed
	}
	public function destroy($id){
		$family = Family::find($id);
		Family::destroy($id);
		$pesan = Yoga::suksesFlash('Famili bernama <strong>' .$family->name .'</strong> Berhasil Dihapus');
		return redirect('home')->withPesan($pesan);
	}
	
	
	
	
}
