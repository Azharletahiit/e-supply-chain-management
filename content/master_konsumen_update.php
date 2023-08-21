<?php
//require_once 'inc/password.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$tanggal = $_POST['tgl_masuk'];
$keterangan = $_POST['ket'];
$telp = $_POST['telp'];

//cari

//Simpan ke Tabel
$simpan = "UPDATE konsumen SET telp = '$telp', nama_konsumen = '$nama', tgl_masuk = '$tanggal', keterangan = '$keterangan' WHERE id = '$kode'";
$save = mysqli_query($con, $simpan);

if ($save) {
    echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='1; url=index?page=master_konsumen'>";
} else {
    echo "<script language=\"javascript\">alert('Terjadi kesalahan')</script>";
    echo "<meta http-equiv='refresh' content='1; url=index?page=master_konsumen'>";
}
