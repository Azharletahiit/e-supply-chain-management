<?php
require_once 'inc/password.php';

if (isset($_POST['jenis'])) {
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    //cari
    $cari = mysqli_query($con, "UPDATE galon SET jenis = '$jenis', harga = '$harga' WHERE id_galon = '$kode'");

    if ($cari) {
        echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index?page=master_galon'>";
    } else {
        echo "<script language=\"javascript\">alert('Data Gagal Disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index?page=master_galon'>";
    }
}
