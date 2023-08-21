<?php
//require_once 'inc/password.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];

//cari

//Simpan ke Tabel
$simpan = "UPDATE suplier SET nama = '$nama', telp = '$telp', alamat = '$alamat' WHERE id = '$kode'";
$save = mysqli_query($con, $simpan);

if ($save) {
    echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='1; url=index?page=master_supplier'>";
} else {
    echo "<script language=\"javascript\">alert('Terjadi kesalahan')</script>";
    echo "<meta http-equiv='refresh' content='1; url=index?page=master_supplier'>";
}
