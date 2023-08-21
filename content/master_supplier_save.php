<?php
//require_once 'inc/password.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];

//cari
$cari = mysqli_query($con, "SELECT * FROM suplier WHERE telp = '$telp'");
$n = mysqli_num_rows($cari);
if ($n == 1) {
    echo "<script language=\"javascript\">alert('Supplier dengan Nomor tersebut Sudah Ada')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index?page=master_supplier'>";
} else {
    //Simpan ke Tabel
    $simpan = "INSERT INTO suplier (nama, alamat, telp) values ('$nama','$alamat','$telp')";
    $save = mysqli_query($con, $simpan) or die(mysqli_error($con));

    echo "<script language=\"javascript\">alert('Data Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index?page=master_supplier'>";
}
