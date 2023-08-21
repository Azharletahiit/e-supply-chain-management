<?php 
	
	function skorPendidikan($jurusan)
	{	
		$skor = 0;
		if ($jurusan == "D4 Pemerintahan") {
			$skor = 80;
		}elseif ($jurusan == "S1 Ilmu Pemerintahan") {
			$skor = 90;
		}elseif ($jurusan == "S2 Ilmu Pemerintahan") {
			$skor = 100;
		}elseif ($jurusan == "Sertifikat Profesi Kepamongprajaan") {
			$skor = 70;
		}else
		{
			$skor = 0;
		}
		return $skor;
	}

	function skorPangkat($pangkat,$tahun)
	{
		$skor;
		if ($pangkat == "III D" && $tahun < 2) {
			$skor = 80;
		}elseif ($pangkat == "III D" && $tahun <= 4) {
			$skor = 90;
		}elseif ($pangkat == "IV A" || $pangkat == "IV B") {
			$skor = 100;
		}
		else{
			$skor = 50;
		}
		return $skor;
	}

	function skorJabatan($jabatan,$tahun)
	{
		$skor;
		if ($jabatan == "Staf Bagian Tata Pemerintahan" || $jabatan == "Staf Kecamatan") 
		{
			$skor = 80;
		}
		elseif ($jabatan == "Kepala Sub Bagian Pemerintahan" || $jabatan == "Kepala Bagian Tata Pemerintahan" || $jabatan == "Kepala Seksi Kecamatan" || $jabatan == "Sekretaris Kecamatan") 
		{
			if ($tahun > 2 ) 
			{
				$skor = 90;
			}
			else
			{
				$skor = 100;
			}
			
		}
		else
		{
			$skor = 50;
		}
		return $skor;
	}

	function masaPangkat($tmt)
	{
		$masaKerja = "";
		$awal  = date_create("$tmt");
		$akhir = date_create(); // waktu sekarang
		$diff  = date_diff( $awal, $akhir );

		$masaKerja = "$diff->y Tahun $diff->m Bulan $diff->d Hari";
		return $masaKerja;
	}

	function masaPangkatTahun($tmt)
	{
		$masaKerja = 0;
		$awal  = date_create("$tmt");
		$akhir = date_create(); // waktu sekarang
		$diff  = date_diff( $awal, $akhir );

		$masaKerja = $diff->y;
		return $masaKerja;
	}
