<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM konsumen WHERE id = '$id'");
$r = mysqli_fetch_array($sql);
?>
<div class="content-wrapper">
   <div class="content-heading">
      <div>Master Konsumen<small>Data Konsumen</small></div>
   </div>
   <div class="row">
      <div class="col-xl-12">
         <div class="card card-default">
            <div class="card-header">
               <div class="card-title">Master Konsumen</div>
            </div>
            <div class="card-body">
               <form action="index?page=master_konsumen_update" method="POST">
                  <input type="hidden" name="kode" value="<?= $r[0] ?>">
                  <label for="">Nama Konsumen</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Konsumen" value="<?= $r['nama_konsumen'] ?>" required>
                  <label for="">Nomor Telepon</label>
                  <input type="text" class="form-control" name="telp" placeholder="Masukan Nomor Telepon" value="<?= $r['telp'] ?>" required>
                  <label for="">Tanggal Masuk</label>
                  <input type="date" class="form-control" name="tgl_masuk" placeholder="Masukan Nama Konsumen" value="<?= $r['tgl_masuk'] ?>" required>
                  <label for="">Keterangan</label>
                  <input type="text" class="form-control" name="ket" placeholder="Masukan Nama Konsumen" value="<?= $r['keterangan'] ?>" required>
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