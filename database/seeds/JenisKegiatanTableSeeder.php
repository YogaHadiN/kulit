<?php

use Illuminate\Database\Seeder;
use App\JenisKegiatan;

class JenisKegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$timestamp = date('Y-m-d H:i:s');
		$jenis_kegiatan = [];

		$jk = [
			'Jaga RSND',
			'Jatul',
			'Jabay',
			'Jagem',
			'PBC',
			'Derma Sore',
			'Derma Pagi',
			'Poli',
			'Poli Kosme'
		];

		foreach ($jk as $j) {
			$jenis_kegiatan[] = [
				'jenis_kegiatan' => $j,
				'created_at' => $timestamp,
				'updated_at' => $timestamp
			];
		}

		JenisKegiatan::insert($jenis_kegiatan);
    }
}
