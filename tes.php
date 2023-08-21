<?php 
	$conn = mysqli_connect("localhost","root","","web"); 
	if (!$conn) {
		die("Gagal Koneksi ". mysqli_connect_error());
	}
