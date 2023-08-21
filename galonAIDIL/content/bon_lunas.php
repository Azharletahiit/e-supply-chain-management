<?php
require_once 'inc/password.php';

if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    //Simpan ke Tabel
    $simpan = "UPDATE penjualan SET status = '1' WHERE id_penjualan = '$kode'";
    $save = mysqli_query($con, $simpan) or die(mysqli_error());

    echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='1; url=index?page=data_bon'>";
}
