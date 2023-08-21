<?php
//require_once 'inc/password.php';

$nama = $_POST['nama'];
$kode = $_POST['kode'];
$level = $_POST['level'];


$cari = mysqli_query($con, "UPDATE user SET nama = '$nama', level = '$level' WHERE id_user = '$kode'");

if ($cari) {
    echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='1; url=index?page=master_pengguna'>";
} else {
    echo "<script language=\"javascript\">alert('Data Gagal Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='1; url=index?page=master_pengguna'>";
}
