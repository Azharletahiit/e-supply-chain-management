<?php
include("koneksi.php");

$op = $_GET['op'];
$kode = $_GET['kode_galon'];

if ($op == 'ambildata') {
	//$kode=$_GET['kode'];
	$dt = mysqli_query($con, "SELECT * FROM galon WHERE id_galon='$kode'");
	$d = mysqli_fetch_array($dt);
	echo $d['harga'];
}
