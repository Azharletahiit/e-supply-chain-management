<?php
require_once 'inc/password.php';

$galon = $_POST['galon'];
$tanggal = date("Y-m-d");
$jumlah = $_POST['jumlah'];
$user = $_POST['user'];
$konsumen = $_POST['konsumen'];
$status = "1";

// $td1 = date_create($tgl);
// $tanggal = date_format($td1, "d-m-Y");

//cek
$sql = mysqli_query($con, "SELECT * FROM galon WHERE jenis LIKE '%Galon%'");
$jml = mysqli_fetch_array($sql);

$cek = mysqli_query($con, "SELECT stok, setting FROM stok WHERE jenis = 'Air'");
$stok = mysqli_fetch_array($cek);

if ($stok['stok'] <= $stok['setting']) {
    echo "<script language=\"javascript\">alert('Stok Air Kosong')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index?page=penjualan'>";
} else {
    //cari
    $simpan = mysqli_query($con, "INSERT INTO penjualan (tanggal, qty, id_galon, id_user, id_konsumen, status)  VALUES ('$tanggal','$jumlah','$galon','$user','$konsumen','$status')");

    if ($simpan) {
        //update stok
        $update = mysqli_query($con, "UPDATE stok SET stok = stok - $stok[setting] WHERE jenis = 'Air'");

        if ($jml['id_galon'] == $galon) {
            $update1 = mysqli_query($con, "UPDATE stok SET stok = stok - $jumlah WHERE jenis = 'Galon'");
        }

        echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index?page=penjualan'>";
    } else {
        //echo mysqli_error($con);
        echo "<script language=\"javascript\">alert('Data Gagal Disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index?page=penjualan'>";
    }
}
