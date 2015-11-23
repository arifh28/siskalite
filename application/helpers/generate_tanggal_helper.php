<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('generate_tanggal'))
{
	function generate_tanggal($tgl)
	{
		$get = explode("-",$tgl);
		$get_tanggal = explode("/",$get[0]);


		$tanggal = $get_tanggal[0];
		$bulan = getBulan($get_tanggal[1]);
		$tahun = $get_tanggal[2];
		return $tanggal.' '.$bulan.' '.$tahun;
	}
	
	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Jan.";
						break;
					case 2:
						return "Feb.";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agus.";
						break;
					case 9:
						return "Sept.";
						break;
					case 10:
						return "Okt.";
						break;
					case 11:
						return "Nov.";
						break;
					case 12:
						return "Des.";
						break;
				}
			} 
}
