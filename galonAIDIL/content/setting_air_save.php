<?php
require_once 'inc/password.php';

if (isset($_POST['setting'])) {
    $setting = $_POST['setting'];
    //cari
    $cari = mysqli_query($con, "UPDATE stok SET setting = '$setting' WHERE jenis = 'Air'");

    if ($cari) {
        echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index?page=galon_masuk'>";
    } else {
        echo "<script language=\"javascript\">alert('Data Gagal Disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index?page=galon_masuk'>";
    }
}
