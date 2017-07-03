<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Contact;
use App\NoTelp;
use App\Address;
use App\Yoga;

class ContactController extends Controller
{
	public function index(){
		$contacts = Contact::with('no_telp', 'address')->get();
		$konsulen = [];
		$ppds     = [];
		$lainnya  = [];
		$updated_at  = $contacts->first()->updated_at;
		foreach ($contacts as $contact) {
			$no_telps = [];
			$hp       = [];
			$alamats  = [];
			foreach ($contact->no_telp as $telp) {
				if (substr( $telp->no_telp, 0, 2 ) === '08') {
					$hp[] = $telp->no_telp;
				} else {
					$no_telps[] = $telp->no_telp;
				}
			}
			foreach ($contact->address as $address) {
				$alamats[] = $address->address;
			}

			$konsulen = $this->ikhtisarkanContact($konsulen, $ppds, $lainnya, $contact->name, $no_telps, $hp, $alamats)['konsulen'];
			$ppds     = $this->ikhtisarkanContact($konsulen, $ppds, $lainnya, $contact->name, $no_telps, $hp, $alamats)['ppds'];
			$lainnya  = $this->ikhtisarkanContact($konsulen, $ppds, $lainnya, $contact->name, $no_telps, $hp, $alamats)['lainnya'];
		}

		return view('contacts.index', compact(
			'konsulen',
			'ppds',
			'lainnya',
			'updated_at'
		));
	}
	
	public function importGoogleContact() {
		// get data from request
		$code = Input::get('code');


		// get google service
		$googleService = \OAuth::consumer('Google');

		// check if code is valid

		// if code is provided get user data and sign in
		if ( ! is_null($code)) {
			// This was a callback request from google, get the token
			$token = $googleService->requestAccessToken($code);

			// Send a request with it
			$result = json_decode($googleService->request('https://www.google.com/m8/feeds/contacts/default/full?alt=json&max-results=400'), true);


			$kontaks  = [];
			foreach ($result['feed']['entry'] as $contact) {
				$no_telps = [];
				$hp=[];
				$alamat = [];
				if (isset($contact['gd$postalAddress'])) {
					foreach ($contact['gd$postalAddress'] as $address) {
						$alamat[] = $address['$t'];
					}
				}
				foreach ($contact['gd$phoneNumber'] as $phone) {
					$telp = preg_replace("/[^0-9]/","",$phone['$t']);
					if (substr($telp, 0, 2) === '62') {
						$telp = substr($telp, 2);
						$telp = '0' . $telp;
					}
					$no_telps[] = $telp;
				}

				$kontaks[] = [
					'name'    => $contact['title']['$t'],
					'alamat'  => $alamat,
					'no_telp' => $no_telps
				];
			}


			$timestamp = date('Y-m-d H:i:s');
			$alamats = [];
			$contacts = [];
			$no_telps = [];

			Contact::truncate();

			try {
				$last_id = Contact::orderBy('id', 'desc')->firstOrFail()->id;
			} catch (\Exception $e) {
				$last_id = 0;
			}
			foreach ($kontaks as $kontak) {
				$last_id++;
				$contacts[] = [
					'id'         => $last_id,
					'name'       => $kontak['name'],
					'created_at' => $timestamp,
					'updated_at' => $timestamp
				];
				foreach ($kontak['alamat'] as $alamat) {
					$alamats[] = [
						'address'          => $alamat,
						'addressable_type' => 'App\Contact',
						'addressable_id'   => $last_id,
						'created_at'       => $timestamp,
						'updated_at'       => $timestamp
					];
				}
				foreach ($kontak['no_telp'] as $no_telp) {
					$no_telps[] = [
						'no_telp'         => $no_telp,
						'telponable_type' => 'App\Contact',
						'telponable_id'   => $last_id,
						'created_at'      => $timestamp,
						'updated_at'      => $timestamp
					];
				}
			}

			$one = NoTelp::where('telponable_type', 'App\Contact')->delete();
			$two = Address::where('addressable_type', 'App\Contact')->delete();
			Contact::insert($contacts);
			NoTelp::insert($no_telps);
			Address::insert($alamats);

			$pesan = Yoga::suksesFlash('Sinkronisasi dengan Google Contact Sukses');
			return redirect('contacts')->withPesan($pesan);
		}
		// if not ask for permission first
		else {
			// get googleService authorization
			$url = $googleService->getAuthorizationUri();
			// return to google login url
			return redirect((string)$url);
		}
	}
	private function ikhtisarkanContact($konsulen, $ppds, $lainnya, $nama, $no_telps, $hp, $alamat){

		if ( // jika ada titel sp.kk atau spkk
			strpos(strtolower( $nama), 'sp.kk') !== false ||
			strpos(strtolower( $nama), 'spkk') !== false
		) {
			$konsulen[] = [
				'name'     => $nama,
				'no_telps' => $no_telps,
				'hp'       => $hp,
				'alamat'   => $alamat
			];
		} else if (substr(strtolower($nama), 0, 2) === 'dr') {
			$ppds[] = [
				'name'     => $nama,
				'no_telps' => $no_telps,
				'hp'       => $hp,
				'alamat'   => $alamat
			];
		} else {
			$lainnya[] = [
				'name'     => $nama,
				'no_telps' => $no_telps,
				'hp'       => $hp,
				'alamat'   => $alamat
			];
		}

		return [
			'konsulen' => $konsulen,
			'ppds'     => $ppds,
			'lainnya'  => $lainnya
		];
	}
}
