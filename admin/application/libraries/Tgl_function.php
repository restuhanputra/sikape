<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class Tgl_function
	{

		function tgl_indo($tanggal)
		{
			$bulan = array(
				1  => "Januari",
				"Februari",
				"Maret",
				"April",
				"Mei",
				"Juni",
				"Juli",
				"Agustus",
				"September",
				"Oktober",
				"November",
				"Desember"
			);
			// dipecah jadi array
			$pecahkan = explode('-', $tanggal);

			// var. pecahkan 0 = tanggal
			// var. pecahkan 1 = bulan
			// var. pecahkan 2 = tahun
			return $pecahkan[2].' '. $bulan[(int)$pecahkan[1]] .' '.$pecahkan[0];

			//  echo tgl_indo(date('Y-m-d'))
			// hasil 19 oktober 2019
		}

		function tgl_indonesia($tgl)
		{
			$nama_bulan = array(
				1  => "Januari",
				"Februari",
				"Maret",
				"April",
				"Mei",
				"Juni",
				"Juli",
				"Agustus",
				"September",
				"Oktober",
				"November",
				"Desember"
			);

			$tanggal = substr($tgl, 8, 2);
			$bulan   = $nama_bulan[(int)substr($tgl, 5, 2)];
			$tahun   = substr($tgl, 0, 4);
			return $tanggal.' '.$bulan .' '. $tahun;
		}
	} /* /.class */
