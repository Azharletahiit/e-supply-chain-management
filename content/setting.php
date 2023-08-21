<div class="content-wrapper">
    <div class="content-heading">
        <div>Setting<small>Ganti Password</small></div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">Ganti Password</div>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_POST['pass_lama'])) {

                        $passlama = $_POST['pass_lama'];
                        $passbaru1 = $_POST['pass_baru1'];
                        $passbaru2 = $_POST['pass_baru2'];
                        $user = $_POST['user'];

                        $pass_lama = md5($passlama);
                        $pass_baru = md5($passbaru1);

                        //cari pass lama
                        $q = "SELECT password FROM user WHERE username = '$user'";
                        $c = mysqli_query($con, $q);
                        $j = mysqli_fetch_array($c);

                        //cari
                        if ($passbaru1 !== $passbaru2) {
                            echo "<script language=\"javascript\">
                                         alert('Password Baru tidak sama!')
                                    </script>";
                            echo "<meta http-equiv='refresh' content='2; url=index?page=setting'>";
                        } else {
                            if ($pass_lama  == $j[0]) {
                                $update = "UPDATE user SET password='$pass_baru' WHERE username = '$user'";
                                $set = mysqli_query($con, $update) or die(mysqli_error());

                                echo "<script language=\"javascript\">
                                         alert('Berhasil, Silahkan Login Kembali')
                                    </script>";
                                echo "<meta http-equiv='refresh' content='1; url=logout'>";
                            } else {
                                echo "<script language=\"javascript\">
                                         alert('Password Lama tidak sama!')
                                    </script>";
                                echo "<meta http-equiv='refresh' content='2; url=index?page=setting'>";
                            }
                        }
                    }
                    ?>
                    <form action="" method="POST" class="p-2">
                        <label for="">Password Lama</label>
                        <input type="hidden" name="user" value="<?= $user ?>">
                        <input type="text" class="form-control" name="pass_lama" placeholder="Masukan Password Lama Anda" required>
                        <label for="">Password Baru</label>
                        <input type="text" class="form-control" name="pass_baru1" placeholder="Masukan Password Baru" required>
                        <label for="">Password Baru Ulangi</label>
                        <input type="text" class="form-control" name="pass_baru2" placeholder="Ulangi Masukan Password Baru" required>
                        <button class="btn btn-labeled btn-success mt-2" type="submit">
                            <span class="btn-label"><i class="fa fa-save"></i></span>Ganti Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>