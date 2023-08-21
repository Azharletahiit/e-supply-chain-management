<?php
require_once 'inc/password.php';

if (isset($_POST['jenis'])) {
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    //cari
    $cari = mysqli_query($con, "SELECT * FROM galon WHERE jenis = '$jenis'");
    $n = mysqli_num_rows($cari);
    if ($n == 1) {
        echo "<script language=\"javascript\">alert('Jenis Galon Sudah Ada')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index?page=master_galon'>";
    } else {
        //Simpan ke Tabel
        $simpan = "INSERT INTO galon (jenis, harga) values ('$jenis','$harga')";
        $save = mysqli_query($con, $simpan) or die(mysqli_error($con));

        echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index?page=master_galon'>";
    }
}
