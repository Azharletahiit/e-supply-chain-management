<?php
require_once 'inc/koneksi.php';

if (isset($_POST['user'])) {
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    //cek user
    $cek = mysqli_query($con, "SELECT * FROM user WHERE username = '$user' AND password = '$pass'");
    $isi = mysqli_fetch_array($cek);
    $jml = mysqli_num_rows($cek);

    if ($jml > 0) {
        session_start();
        $_SESSION['nama'] = $isi['nama'];
        $_SESSION['username'] = $isi['username'];
        $_SESSION['level'] = $isi['level'];

        $user = $_SESSION['username'];
        $level = $_SESSION['level'];
        $nama = $_SESSION['nama'];

        echo "<meta http-equiv='refresh' content='1; url=index'>";
    } else {
        echo "<script>alert('Password / Username Salah!')</script>";
        echo "<meta http-equiv='refresh' content='1; url=index'>";
    }
}
