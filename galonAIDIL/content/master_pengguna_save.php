<?php
//require_once 'inc/password.php';

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

//cari
$cari = mysqli_query($con, "SELECT username FROM user WHERE username = '$username'");
$n = mysqli_num_rows($cari);
if ($n == 1) {
    echo "<script language=\"javascript\">alert('Username Sudah Ada')</script>";
    echo "<meta http-equiv='refresh' content='1; url=index?page=master_pengguna'>";
} else {
    //Simpan ke Tabel
    $simpan = "INSERT INTO user values ('','$nama','$username','$password','$level')";
    $save = mysqli_query($con, $simpan) or die(mysqli_error($con));

    echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='1; url=index?page=master_pengguna'>";
}
