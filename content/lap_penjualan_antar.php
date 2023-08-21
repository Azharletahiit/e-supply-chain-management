<?php
$tanggal = date("d-m-Y");
$bulan = date("m");
?>

<div class="content-wrapper">
  <div class="content-heading">
    <div>Laporan<small>Laporan Penjualan Antar</small></div>
  </div>
  <div class="row">
    <div class="col-xl-6">
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Laporan Penjualan Antar</div>
        </div>
        <div class="card-body">
          <form action="laporan_penjualan_antar" method="POST" target="_blank">
            <label for="">Konsumen</label>
            <select name="konsumen" class="form-control">
              <?php
              $sql = mysqli_query($con, "SELECT * FROM konsumen");
              while ($r = mysqli_fetch_array($sql)) {
                echo "<option value='$r[0]'>$r[1]</option>";
              }
              ?>
            </select>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="">Dari Tanggal</label>
                <input type="date" class="form-control" name="dari_tanggal" required>
              </div>
              <div class="col-md-6">
                <label for="">Sampai Tanggal</label>
                <input type="date" class="form-control" name="sampai_tanggal" required>
              </div>
            </div>
            <hr>
            <button class="btn btn-labeled btn-success mb-2" type="submit">
              <span class="btn-label"><i class="fa fa-check"></i></span>Proses
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>