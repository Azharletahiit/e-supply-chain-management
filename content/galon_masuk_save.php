<?php
require_once 'inc/password.php';

$jenis = $_POST['jenis'];
$supplier = $_POST['supplier'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];
$id = ($jenis == "Air" ? "1" : "2");

//simpan
$simpan = mysqli_query($con, "INSERT INTO galon_masuk (tanggal_masuk, jumlah_masuk, jenis, id_supplier) VALUES ('$tanggal','$jumlah','$jenis', '$supplier')");

if ($simpan) {
    //update stok
    $update = mysqli_query($con, "UPDATE stok SET stok = stok + $jumlah WHERE jenis = '$jenis'");

    echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index?page=galon_masuk'>";
} else {
    //echo mysqli_error($con);
    echo "<script language=\"javascript\">alert('Data Gagal Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index?page=galon_masuk'>";
}
