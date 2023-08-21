<?php
//require_once 'inc/password.php';

$nama = $_POST['nama'];
$tanggal = $_POST['tgl_masuk'];
$keterangan = $_POST['ket'];
$telp = $_POST['telp'];

//cari
$cari = mysqli_query($con, "SELECT * FROM konsumen WHERE telp = '$telp'");
$n = mysqli_num_rows($cari);
if ($n == 1) {
    echo "<script language=\"javascript\">alert('Konsumen dengan Nomor tersebut Sudah Ada')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index?page=master_konsumen'>";
} else {
    //Simpan ke Tabel
    $simpan = "INSERT INTO konsumen (telp, nama_konsumen, tgl_masuk, keterangan) values ('$telp','$nama','$tanggal','$keterangan')";
    $save = mysqli_query($con, $simpan) or die(mysqli_error($con));

    echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index?page=master_konsumen'>";
}
