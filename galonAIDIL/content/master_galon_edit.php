<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM galon WHERE id_galon = '$id'");
$r = mysqli_fetch_array($sql);
?>
<div class="content-wrapper">
  <div class="content-heading">
    <div>Master Galon<small>Data Jenis Galon</small></div>
  </div>
  <div class="row">
    <div class="col-xl-6">
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Edit Menu Penjualan</div>
        </div>
        <div class="card-body">
          <form action="index?page=master_galon_update" method="POST">
            <label for="">Jenis Galon</label>
            <input type="hidden" name="kode" value="<?= $r[0] ?>">
            <input type="text" class="form-control" name="jenis" placeholder="Masukan Jenis Galon" value="<?= $r[1] ?>" required>
            <label for="">Harga</label>
            <input type="number" class="form-control" name="harga" placeholder="Masukan Harga" value="<?= $r[2] ?>" required>
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