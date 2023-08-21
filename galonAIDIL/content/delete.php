<?php

$kode = $_GET['id'];
$tabel = $_GET['t'];

$pesan = "<script language=\"javascript\">
                         alert('Data Berhasil Di Hapus')
                    </script>";

switch ($tabel) {
  case 'galon':
    mysqli_query($con, "DELETE FROM galon WHERE id_galon = '$kode'");
    echo "$pesan";
    echo "<meta http-equiv='refresh' content='0; url=index?page=master_galon'>";
    break;

  case 'pengeluaran':
    mysqli_query($con, "DELETE FROM pengeluaran WHERE id_pengeluaran = '$kode'");
    echo "$pesan";
    echo "<meta http-equiv='refresh' content='0; url=index?page=pengeluaran'>";
    break;

  case 'user':
    mysqli_query($con, "DELETE FROM user WHERE id_user = '$kode'");
    echo "$pesan";
    echo "<meta http-equiv='refresh' content='0; url=index?page=master_pengguna'>";
    break;

  case 'konsumen':
    mysqli_query($con, "DELETE FROM konsumen WHERE id = '$kode'");
    echo "$pesan";
    echo "<meta http-equiv='refresh' content='0; url=index?page=master_konsumen'>";
    break;

  case 'suplier':
    mysqli_query($con, "DELETE FROM suplier WHERE id = '$kode'");
    echo "$pesan";
    echo "<meta http-equiv='refresh' content='0; url=index?page=master_supplier'>";
    break;

  case 'galon_masuk':
    //cari
    $cari = mysqli_query($con, "SELECT * FROM galon_masuk WHERE id_masuk = '$kode'");
    $get = mysqli_fetch_array($cari);
    mysqli_query($con, "DELETE FROM galon_masuk WHERE id_masuk = '$kode'");
    mysqli_query($con, "UPDATE stok SET stok = stok - $get[jumlah_masuk] WHERE jenis = '$get[jenis]'");
    echo "$pesan";
    echo "<meta http-equiv='refresh' content='0; url=index?page=galon_masuk'>";
    break;

  default:
    # code...
    break;
}
