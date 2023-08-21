<?php
	date_default_timezone_set("Asia/Jayapura");
	require_once('fungsi.php');

	$db = "galon";
	$host = "localhost";
	$user = "root";
	$pass = "";

	$tanggal = date('d M Y');
	$hari = date('l');
	$am = date("A");
	$bulan = date("m");
	$bln = date("F");
	$tahun = date("Y");
	$hr = date("d");
	$menit = date("G:i:s");	

	$con = mysqli_connect($host,$user,$pass,$db);
