<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM user WHERE id_user = '$id'");
$r = mysqli_fetch_array($sql);
?>
<div class="content-wrapper">
  <div class="content-heading">
    <div>Master User<small>Data Jenis User</small></div>
  </div>
  <div class="row">
    <div class="col-xl-6">
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Edit Pengguna</div>
        </div>
        <div class="card-body">
          <form action="index?page=master_pengguna_update" method="POST">
            <label for="">Nama Pengguna</label>
            <input type="hidden" name="kode" value="<?= $r[0] ?>">
            <input type="text" class="form-control" name="nama" value="<?= $r[1] ?>" required>
            <label for="">Username</label>
            <input type="username" class="form-control" name="username" value="<?= $r[2] ?>" required readonly>
            <label for="">Level</label>
            <select name="level" class="form-control">
              <option <?php if ($r[4] == "Admin") {
                        echo "selected";
                      } ?>>Admin</option>
              <option <?php if ($r[4] == "Kasir") {
                        echo "selected";
                      } ?>>Kasir</option>
            </select>
            <hr>
            <button class="btn btn-labeled btn-success mb-2" type="submit">
              <span class="btn-label"><i class="fa fa-save"></i></span>Update Data
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>