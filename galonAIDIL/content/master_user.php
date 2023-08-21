<div class="content-wrapper">
  <div class="content-heading">
    <div>Master User<small>Data User Pengguna Aplikasi</small></div>
  </div>
  <div class="row">
    <div class="col-xl-6">
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Master User</div>
        </div>
        <div class="card-body">
          <?php
          require_once 'inc/password.php';

          if (isset($_POST['username'])) {
            $username = $val->validasi($_POST['username'], 'xss');
            $level = $val->validasi($_POST['level'], 'xss');
            $pass = $_POST['password'];

            $pass_hash = password_hash($pass, PASSWORD_BCRYPT);

            //cari
            $cari = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
            $n = mysqli_num_rows($cari);
            if ($n == 1) {
              echo "<script language=\"javascript\">
                                     swal({
                                          title: 'Error!',
                                          text: 'User $username sudah ada pada database!',
                                          type: 'error',
                                          confirmButtonText: 'Ok'
                                        })
                                </script>";
              echo "<meta http-equiv='refresh' content='2; url=index?page=master_user'>";
            } else {
              //Simpan ke Tabel
              $simpan = "INSERT INTO user (username,password,level) values ('$username','$pass_hash','$level')";
              $save = mysqli_query($con, $simpan) or die(mysqli_error());

              echo "<script language=\"javascript\">
                                     swal({
                                          title: 'Succes!',
                                          text: 'Berhasil Menambahkan User Baru!',
                                          type: 'success',
                                          confirmButtonText: 'Ok'
                                        })
                                </script>";
              echo "<meta http-equiv='refresh' content='2; url=index?page=master_user'>";
            }
          }
          ?>
          <form action="" method="POST">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
            <label for="">Kabupaten / Kota</label>
            <fieldset>
              <select class="custom-select custom-select-sm" name="level">
                <?php
                $kabkota = mysqli_query($con, "SELECT * FROM kabkota");
                while ($kk = mysqli_fetch_array($kabkota)) {

                ?>
                  <option><?= $kk[1] ?></option>
                  <?php } ?>n>
              </select>
            </fieldset>
            <button class="btn btn-labeled btn-success mb-2" type="submit">
              <span class="btn-label"><i class="fa fa-save"></i></span>Simpan Data
            </button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Master User</div>
        </div>
        <div class="card-body">
          <table class="table table-striped my-4 w-100" id="datatable1">
            <thead>
              <tr>
                <th data-priority="1">Kab/Kota</th>
                <th>username</th>
                <th>level</th>
                <th class="sort-numeric">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $user = mysqli_query($con, "SELECT * FROM user WHERE level != 'Admin'");
              while ($r = mysqli_fetch_array($user)) {

              ?>
                <tr class="gradeC">
                  <td><?= $r[3] ?></td>
                  <td><?= $r[1] ?></td>
                  <td>User</td>
                  <td>
                    <a href="index?page=delete&id=<?= $r[0] ?>&t=user" class="btn btn-danger btn-xs" onclick='return confirm("Hapus User?")'><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>