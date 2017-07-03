<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormatSms;
use App\SmsLine;
use App\Yoga;
use Input;
use DB;

class SmsController extends Controller
{
	public function index(){
		$format_sms = FormatSms::all();
		return view('sms_infos.index', compact(
			'format_sms'
		));
	}
	public function create(){
		return view('sms_infos.create');
	}
	public function store(Request $request){
		DB::beginTransaction();
		try {
			
			if ($this->valid( Input::all() )) {
				$this->valid( Input::all() );
			}

			$format       = new FormatSms;
			$format->title   = $request->title ;
			$format->save();

			$sms = $request->sms;
			$sms = explode( PHP_EOL, $sms );

			$sms_lines = [];
			$timestamp = date('Y-m-d H:i:s');
			foreach ($sms as $s) {
				$sms_lines[] = [
					'sms'           => $s,
					'format_sms_id' => $format->id,
					'created_at'    => $timestamp,
					'updated_at'    => $timestamp
				];
			}
			SmsLine::insert($sms_lines);
			$pesan = Yoga::suksesFlash('Format SMS Baru Berhasil dibuat');
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
		return redirect('sms_infos')->withPesan($pesan);
	}
	
	private function valid($data){
			$messages = [
				'required' => ':attribute Harus Diisi',
			];
			$rules = [
				'titel' => 'required',
				'sms' => 'required'
			];
			
			$validator = \Validator::make($data, $rules, $messages);
			
			if ($validator->fails())
			{
				return \Redirect::back()->withErrors($validator)->withInput();
			}
	}
	
	
}
