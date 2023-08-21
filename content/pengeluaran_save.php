<?php
require_once 'inc/password.php';

$user = $_POST['user'];
$tanggal = $_POST['tanggal'];
$jenis = $_POST['jenis'];
$total = $_POST['total'];
$ket = $_POST['keterangan'];

$date = date_create($tanggal);
$xtanggal = date_format($date, "Y-m-d");

//simpan
$simpan = mysqli_query($con, "INSERT INTO pengeluaran (jenis, tanggal, total, keterangan, id_user) VALUES ('$jenis','$xtanggal','$total','$ket','$user')");

if ($simpan) {
    echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index?page=pengeluaran'>";
} else {
    echo "<script language=\"javascript\">alert('Data Gagal Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index?page=pengeluaran'>";
}
