<?php

use Illuminate\Database\Seeder;
use App\FormatSms;
use App\SmsLine;

class SmsInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		try {
			$last_id = FormatSms::orderBy('id', 'desc')->firstOrFail()->id;
		} catch (\Exception $e) {
			$last_id = 0;
		}

		$timestamp   = date('Y-m-d H:i:s');
		$sms_formats = [];
		$sms_lines   = [];

		$last_id++;
		$sms_formats[] = [
			'id' => $last_id,
			'title' => 'Perkenalan ke residen',
			'created_at' => $timestamp,
			'updated_at' => $timestamp
		];
		$sms_lines[] = [
			'format_sms_id' => $last_id,
			'sms' => 'Selamat sore buX/pakX, saya Y residen junior kulit. Saya ingin menyampaikan jika bapak/ibu adalah residen senior pegangan saya. Jika bapak/ibu perlu sesuatu dapat menghubungi di nomor ini. Tq',
			'created_at' => $timestamp,
			'updated_at' => $timestamp
		];
	
		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format sms bulanan');
		$sms = [
			'Selamat sore bu raras, maaf mengganggu, mau memberitahukan',
			'Jadwal PBC bulan desember : hr selasa/ tgl 6 j.10, mod: dr. Diah',
			'Jadwal jaga: ',
			'Jagem : Hr selasa/tgl 13',
			'Jabay:',
			'Hr minggu/ tgl 18',
			'Hr jumat/ tgl 23',
			'Jadwal derma sore: ',
			'Hr jumat/tgl 2 staf : dr. Rahmat, partner: EN',
			'Hr selasa/ tgl 20, staf : dr. Radityastuti, partner: FT',
			'Jadwal RSND:',
			'Hr kamis/tgl 29. Tq.'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);




		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format sms bulanan (bila residen tsb stase luar)');
		$sms = [
			'Selamat sore bu dhesi,  maaf mengganggu, mau memberitahukan',
			'Jadwal PBC bulan desember : tidak ada',
			'Jadwal derma sore: tidak ada. Tq.',
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format sms harian');
		$sms = [
			'LT: senin, PBC j.11 : ID : LK basah : SHO, Mod: dr. Holy.',
			'Poli : MY, SW, EN, CS',
			'Poli kosme: EC',
			'Derma pagi:',
			'Dr. Sugastiasri, AR, IG, SC',
			'Derma sore: Dr. Rahmat, FT, ER',
			'Jaga RSND: TG. Tq.',
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);


		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format sms harian (bila g ada pbc)');
		$sms = [
			'LT: selasa, tidak ada PBC.',
			'Poli : LT, PP, NG, MA',
			'Poli kosme: EC',
			'Derma pagi:',
			'Dr. Radityastuti, AR, IG, SC',
			'Derma sore: Dr. Radityastuti, RR, NG',
			'Jaga RSND: LD. Tq',
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);

		
		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format sms harian (bila ada 2 pbc yg moderatornya sama)');
		$sms = [
			'LT: Rabu, PBC j.8 : 1) AR : LK : Kandidiasis intertriginosa pada DM, 2) AL : LK : HZO, Mod : dr. Puguh.',
			'Poli : LT, PP, NG, MA',
			'Poli kosme: EC',
			'Derma pagi:',
			'Dr. Puguh, AR, IG, SC',
			'Derma sore: Dr. Rahmat, ID, AL',
			'Jaga RSND: SW. Tq.',
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format pbc dibatalkan:');
		$sms = [
			'INFO: maaf, PBC j.8.00 dengan moderator : dr. Lewie dibatalkan. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);


		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format ralat jaga poli:');
		$sms = [
			'INFO: maaf, ralat jaga poli hr jumat/tgl 23 : MY, ID, RR, IO, tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);

	
	
		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format bila pbc akan dimulai (dikirim saat moderator sudah rawuh) :');
		$sms = [
			'INFO: maaf, pbc segera dimulai, tq.'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);
	
	
		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format bila pbc dimajukan');
		$sms = [
			'INFO: maaf, pbc pukul 11.00 dengan moderator dr holy dimajukan menjadi pukul 930, tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);
	
		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format sms info hari sabtu');
		$sms = [
			'INFO: maaf, jaga hari sabtu/tgl 24, jagut: CS, jabay: EN.',
			'Derma pagi : dr.Rahmat, AR, IG, SC',
			'Derma sore : dr. Holy, AY, EC. Tq.',
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);


		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format sms info hari minggu');
		$sms = [
			'INFO: maaf jaga minggu/tgl 25. Jagut : TI, jabay : DW. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);

		

		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format konfirmasi maju PBC (dilakukan h-1 pembacaan, pukul 17.00)');
		$sms = [
			'Selamat sore pak raymond, maaf mengganggu. Ingin menanyakan apakah besok bapak jadi maju PBC? Dengan judul apa ya pak? Untuk staf yang hadir siapa saja ya pak? Tq.'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);




		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format konfirmasi maju PBC (dilakukan h-1 pembacaan, pukul 17.00)');
		$sms = [
			'Selamat sore pak raymond, maaf mengganggu. Ingin menanyakan apakah besok bapak jadi maju PBC/JR/LK/TP? Dengan judul apa ya pak? Untuk staf yang hadir siapa saja ya pak? Tq.'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);

		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format jika ada PBC proposal ( dikirimkan hanya untuk smt 4 k atas) v');
		$sms = [
			'INFO : Kepada semua residen semester 4 keatas dimohon kehadirannya pada PBC Rabu, 14 Desember 2016 j. 8.00: YD : Proposal. Mod: dr. Puguh. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format jika ada PBC Seminar hasil (semhas) ( dikirimkan hanya untuk smt 5 k atas)');
		$sms = [
			'INFO : Kepada semua residen semester 5 keatas dimohon kehadirannya pada PBC Rabu, 14 Desember 2016 j. 8.00: DN : seminar hasil. Mod: dr. Puguh. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms konsulan ruangan jm kerja non by name');
		$sms = [
			'Maaf, konsul dari ruang R1B. a.n. Abdul Hamid/43 th, CM : C611195. Dx : post trakeostomi. Keluhan di kulit : gatal gatal dengan bula pada badan dan ekstremitas. (FT, DW, RO). Tq  (MY).'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);




		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info latihan utulnas (ujian tulis nasional) dikirim smt 4 k atas');
		$sms = [
			'INFO:Maaf, akan diadakan Simulasi UTULNAS, pada hari senin/ tgl 14 november 2016 pukul 09.00 di UPF lt3, dengan peserta seluruh residen semester 4 ke atas kecuali jaga/ ujian/ ada keperluan akademik, diharapkan membawa pensil 2B & penghapusnya. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Info mengingatkan simulasi utulnas. Dikirim H-1 setelah sms harian.'); 
		$sms = [
			'INFO:Maaf, mengingatkan akan diadakan Simulasi Utulnas pada hari Senin, 14 november 2016, jam 9.00 di Upf lt3, yang diikuti oleh residen semester 4 ke atas kecuali jaga/ujian/ada keperluan akademik. Peserta diharapkan membawa pensil 2B dan penghapusnya. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);




		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info berita bahagia'); 
		$sms = [
			'INFO: Syukur Alhamdulillah telah lahir dengan selamat putri ke-3 dr. Novi Kusumaningrum, SpKK (cucu ke-11 Prof.DR.dr. Prasetyowati S, SpKK(K)) di Korea. Semoga menjadi anak shalehah, kebanggaan ayah bunda dan bermanfaat bagi sesama, Aamiin YRA. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);




		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Info simulasi utulnas akan d mulai'); 
		$sms = [
			'INFO: maaf, acara simulasi UTULNAS segera dimulai, dimohon kehadiran seluruh residen semester 4 ke atas, tq.'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info berita bahagia'); 
		$sms = [
			'Kepada',
			'Yth. Dr. YF Rahmat Sugianto,SpKK dan keluarga',
			' ',
			'Dengan hormat, ',
			'Kami sekeluarga mengucapkan: selamat merayakan hari raya natal dan tahun baru 2017. ',
			' ',
			'Dr. Dhesi ariembi',
			'Residen IK Kulit dan kelamin FK Undip',
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);
		


		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Format konfirmasi pembahas :'); 
		$sms = [
			'Selamat sore bu nadia. Maaf mengganggu. Ingin mengkonfirmasi jika besok ibu menjadi pembahas saya untuk PBC jurnal dengan moderator dr. Paulus j.9.00. Tq.'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		
		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Co sms info Demo Alat :'); 
		$sms = [
			'INFO:maaf, akan diadakan Uji Fungsi Alat & Demo Laser Erbium dan ND Yag di poli kosme pasa hari Rabu tgl 7 des 16, j10. Diharapkan kepada semua residen untuk hadir, kecuali stase luar dan jaga poli. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		
		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info acara segera dimulai'); 
		$sms = [
			'INFO: maaf, Uji Fungsi Alat & Demo Laser Erbium akan segera dimulai. Diharapkan kehadiran seluruh residen kecuali stase luar dan jaga poli. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);




		
		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'H-1 sms info mengingatkan'); 
		$sms = [
			'INFO:maaf, mengingatkan akan diadakan Uji Fungsi Alat & Demo Laser Erbium dan ND Yag di poli kosme yang sebelumnya akan diadakan presentasi di ruang diskusi depan poli kulit dan kelamin lantai 2  j10. Diharapkan kepada semua residen untuk hadir, kecuali stase luar dan jaga poli. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info undangan untuk seluruh residen :'); 
		$sms = [
			'INFO:Selamat berbahagia Anis Eko A & Maryatun (perawat poli kosmetik) yg akan diselenggarakan resepsi pernikahan Sabtu, 10 Desember 2016 jam 11-14 di desa sumberjosari rt 06/rw01 karangrayung-grobogan. Berikut sekaligus sbg undangan bagi seluruh residen IKKK. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);

		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info simulasi OSCE residen'); 
		$sms = [
			'INFO:Maaf, mengingatkan akan diadakan Simulasi OSCE, pada hari Rabu 23 Nov 2016 jam 09.00 di UPF lt3, dg peserta sbb: SW, IK, YD, AL, RR, TG, DW. Dimohon peserta dan pendamping sudah standby di ruang UPF lt3 pada pukul 08.40. Tq.'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Info acara syukuran kelulusan SpKK baru'); 
		$sms = [
			'INFO:Maaf, akan diadakan acara syukuran kelulusan SpKK baru (dr.Aning, dr.Monika, dr.Ade, dr.Lily) pada hari rabu/ 9 Nov 2016, pukul 10.00, bertempat di SMF Kulit lt III, dimohon untuk kehadiran seluruh residen, kecuali stase luar. Tq.'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Acara segera d mulai'); 
		$sms = [
			'INFO:maaf, acara syukuran Sp.KK segera dimulai diharapkan kehadiran sejawat residen. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info kelahiran'); 
		$sms = [
			'INFO: Maaf memberitahukan, telah lahir putri kedua dr.Clarissa secara sectio dg BB 3300gr kemarin,31 Oktober 2016 pukul 09.15 di RS Tlogorjo Semarang. Semoga menjadi anak yg berbakti dan menjadi kebanggaan orang tua, Amin. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info acara presentasi Alat'); 
		$sms = [
			'INFO:Maaf, akan diadakan acara Presentasi alat skin analiser dan uji fungsi alat hair analiser, pada hari Rabu, 16 November 2016 jam 11.00 di poli kosmetik RSDK, dimohon untuk kehadiran seluruh residen, kecuali jaga poli dan stase luar. Tq.'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Osce COAS'); 
		$sms = [
			'INFO:Akan diadakan ujian osce coass pada hari Jumat, 2 des jam 09.00-12.00 dg residen yg bertugas/ sbg probandus: MA, MR, TI, SC, ID, PP dimohon utk mulai standby jam 08.00 utk membantu persiapan pelaksanaan ujian osce coass. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info osce coass mendatang'); 
		$sms = [
			'INFO:Akan diadakan ujian osce coass pada hari Kamis, 29 des jam 09.00 di LabSkill lt 3 Tembalang dg residen yg bertugas/sbg probandus: LT, MA, MR, CS, AY, ID, PP, FT, EN, DW, YD, AL. dimohon utk mulai standby jam 08.00 utk membantu persiapan pelaksanaan ujian osce coass. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info ajakan jengukan bila ada yg sakit'); 
		$sms = [
			'INFO:Akan diadakan jengukan bersama istri dr. Yudha di RSUD Ungaran semester 1&2. Bagi residen yg berkenan ingin bergabung dapat berkumpul di RSUD Ungaran pada hari ini, jam 10.00. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);





		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info bila ada yg sakit'); 
		$sms = [
			'INFO: maaf, memberitahukan bahwa dr. Irma Binarso, SpKK sedang sakit dan dirawat di RS Elizabeth rg Anna 407. Semoga segera diberi kesembuhan dan kesehatan. Aamiin YRA.'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);






		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'SMS Info undangan rapat'); 
		$sms = [
			'INFO:maaf, akan diadakan rapat sie acara konas oleh Dr. TM. Sri Redjeki S, Sp.KK (K),Msi. Med FINSDV hari ini, 25 oktober 2016 pk 13.00 setelah acara RTD di seoul palace. Dimohon kehadiran seluruh sie acara konas (MY, EC, MA, CS, ND, DW, YD). Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);





		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'SMS Info Pengumuman'); 
		$sms = [
			'INFO: maaf, memberitahukan susunan panitia KONAS 2017 perdoski : sie ilmiah: 1. simposium : FT,EN 2. workshop: DS,SC 3. pra konas: IG,MY 4. makalah bebas: MI,LT 5. poster: PP, RR. sie acara: 1. persidangan dan organisasi: EC,ND,MY 2. acara dan kesenian: CS,DW 3. sosial dan pengabdian masyarakat: MA. sie konsumsi: AY,AR,CL. sie publikasi: IO. sie dana: IK. sie pameran dan perkap: AL. sie akomodasi dan transportasi : BN,TG. sie kesehatan dan keamanan: ID. sie sekertariat: TI,LT. sie bendahara: HN,MR. Penanggungjawab pembicara: YD. Nama yang tercetak pertama adalah koordinator. tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);







		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'SMS Info Penundaan PBC'); 
		$sms = [
			'INFO: Maaf, PBC j.10 dengan Mod : Dr. Holy menunggu setelah kuliah S1 yang sedang berlangsung pada ruang PBC besar. Tq'
		];

		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);




		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'SMS Info Penundaan rapat'); 
		$sms = [
			'INFO: maaf, rapat sie acara konas oleh Dr. TM. Sri Redjeki S, Sp.KK (K),Msi. Med FINSDV hari ini, 25 oktober 2016 pk 13.00 batal. Info selanjutnya menyusul. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);



		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'SMS Info Pembentukan Panitia'); 
		$sms = [
			'INFO:Akan diadakan syukuran SpKK (dr.Aning, dr.Monika, dr.Ade, dr.Lily) pada hari Rabu 9 Nov 2016 dg panitia sbb:',
			'Perkap EC,IG,TI,LT',
			'Konsumsi MI, MR, MY',
			'Sekre SC,MA,MY',
			'Acara ND,CS,LT',
			'Nama tercetak pertama adalah koordinator. Tq',
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);
		


		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms info mengingatkan pembayaran spp'); 
		$sms = [
			'LT: Selamat pagi bu Arin. Maaf mengganggu. Maaf bu, mengingatkan utk pmbayaran SPP ibu sebesar Rp 15.000.000 dibayarkan paling lambat 27 Juli 2016. Dpt dgn setor tunai melalui BTN,BNI 46,BRI,Mandiri dgn mmberi tahu billkey ke teller/melalui ATM BRI, Mandiri, Internet Banking Mandiri (no.billkey ibu : 22100113320005), atau dpt dtitipkan pd saya. Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);
		

		$last_id++;
		$sms_formats = $this->smsFormat($last_id, $sms_formats, 'Sms konfirmasi Hantaran'); 
		$sms = [
			'Selamat pagi Bu Dwi, maaf mengganggu. Saya Amel residen junior kulit. Ijin konfirmasi,  memberitahukan bahwa pada sore hari ini jam 17, saya akan mengantarkan Hantaran ujian Bedah kulit atas nama Bu Dwi dan Pak Teguh untuk dr. Retno.
 Tq'
		];
		$sms_lines = $this->smsLines($last_id, $sms_lines,$sms);


		FormatSms::insert( $sms_formats );
		SmsLine::insert( $sms_lines );


    }

	private function smsFormat($last_id, $sms_formats, $title){
		$timestamp = date('Y-m-d H:i:s');

		$sms_formats[] = [
			'id'         => $last_id,
			'title'      => $title,
			'created_at' => $timestamp,
			'updated_at' => $timestamp
		];

		return $sms_formats;

	}
	private function smsLines($last_id, $sms_lines, $sms){
		$timestamp = date('Y-m-d H:i:s');
		
		foreach ($sms as $s) {
			$sms_lines[] = [
				'format_sms_id' => $last_id,
				'sms'           => $s,
				'created_at' => $timestamp,
				'updated_at' => $timestamp
			];
		}

		return $sms_lines;

	}
}
