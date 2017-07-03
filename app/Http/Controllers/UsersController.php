<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\User;
use App\NoTelp;
use App\Yoga;
use DB;

class UsersController extends Controller
{
	public function edit($id){
		$user = User::find($id);
		/* return dd($user->no_telp); */
		return view('users.edit', compact(
			'user'
		));
	}
	public function update($id, Request $request){
		$this->valid(Input::all());

		DB::beginTransaction();
		try {
			$user                 = User::find($id);
			$user->name           = $request->name;
			$user->alamat         = $request->alamat;
			if (!empty( $request->password )) {
				$user->password       = bcrypt( $request->password );
			}
			$user->save();

			NoTelp::where('telponable_type', 'App\User')
				->where('telponable_id',$id)
				->delete();

			$timestamp = date('Y-m-d H:i:s');
			
			if (count( $request->no_telps )) {
				$no_telps = [];
				foreach ($request->no_telps as $telp) {
					if ( !empty(trim( $telp )) ) {
						$no_telps[] = [
							'telponable_type' => 'App\User',
							'telponable_id'   => $id,
							'no_telp'            => $telp,
							'created_at'      => $timestamp,
							'updated_at'      => $timestamp
						];
					}
				}
				NoTelp::insert($no_telps);
			}
			$pesan = Yoga::suksesFlash('Mengubah User telah Berhasil');
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}

		return redirect('home')->withPesan($pesan);

	}

	private function valid($request){
		$messages = [
			'required' => ':attribute Harus Diisi',
		];
		$rules = [
			'name'           => 'required|string|max:255',
			'email'          => 'required|string|email|max:255|unique:users',
			'alamat'         => 'required',
			'no_telp'        => 'required',
			'family_name'    => 'required',
			'family_telp'    => 'required',
			'family_address' => 'required',
			'password'       => 'string|min:6|confirmed',
		];
		
		$validator = \Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}
	}
	
	
}
