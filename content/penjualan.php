<?php
$tanggal = date("m/d/Y");

$sql1 = mysqli_query($con, "SELECT * FROM stok WHERE id = '1'");
$stok_air = mysqli_fetch_array($sql1);

$sql2 = mysqli_query($con, "SELECT * FROM stok WHERE id = '2'");
$stok_galon = mysqli_fetch_array($sql2);
?>

<div class="content-wrapper">
  <div class="content-heading">
    <div>Transaksi<small>Penjualan Galon</small></div>
  </div>
  <div class="row">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-xl-6">
          <!-- START card-->
          <div class="card border-0">
            <div class="row row-flush">
              <div class="col-4 bg-info text-center d-flex align-items-center justify-content-center rounded-left"><em class="fa fa-tint fa-2x"></em></div>
              <div class="col-8">
                <div class="card-body text-center">
                  <h4 class="mt-0"><?= $stok_air['stok'] ?> Liter</h4>
                  <p class="mb-0 text-muted">Stok Air (1 Galon = <?= $stok_air['setting'] ?> Liter)</p>
                </div>
              </div>
            </div>
          </div><!-- END card-->
        </div>
        <div class="col-xl-6">
          <!-- START card-->
          <div class="card border-0">
            <div class="row row-flush">
              <div class="col-4 bg-danger text-center d-flex align-items-center justify-content-center rounded-left"><em class="fa fa-dollar-sign fa-2x"></em></div>
              <div class="col-8">
                <div class="card-body text-center">
                  <h4 class="mt-0"><?= $stok_galon['stok'] ?></h4>
                  <p class="mb-0 text-muted">Stok Galon</p>
                </div>
              </div>
            </div>
          </div><!-- END card-->
        </div>
      </div>
    </div>
    <div class="col-xl-12">
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Penjualan Galon</div>
        </div>
        <div class="card-body">
          <form action="index?page=penjualan_save" method="POST">
            <input type="hidden" value="<?= $userdata[0] ?>" name="user">
            <div class="form-group row">
              <div class="col-md-12">
                <label for="">Konsumen</label>
                <select name="konsumen" class="form-control">
                  <?php
                  $sql = mysqli_query($con, "SELECT * FROM konsumen");
                  while ($r = mysqli_fetch_array($sql)) {
                    echo "<option value='$r[0]'>$r[nama_konsumen] - $r[telp]</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="">Jenis Galon</label>
                <select name="galon" class="form-control" id="kode">
                  <option>-Pilih Jenis Galon-</option>
                  <?php
                  $sql = mysqli_query($con, "SELECT * FROM galon");
                  while ($r = mysqli_fetch_array($sql)) {
                    echo "<option value='$r[0]'>$r[1]</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6">
                <label for="">Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" readonly>
              </div>
            </div>
            <label for="">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukan Jumlah Beli" required>

            <label for="">Total</label>
            <input type="text" class="form-control" name="total" id="total" readonly>
            <hr>
            <button class="btn btn-labeled btn-success mb-2" type="submit">
              <span class="btn-label"><i class="fa fa-save"></i></span>Simpan Data
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-xl-12">
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Data Penjualan Galon</div>
        </div>
        <div class="card-body">
          <table class="table table-striped my-4 w-100" id="datatable1">
            <thead>
              <tr>
                <th data-priority="1">Tanggal</th>
                <th>Konsumen</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tgl = date("d-m-Y");
              $user = mysqli_query($con, "SELECT p.*, g.*, k.nama_konsumen FROM penjualan p, galon g, konsumen k WHERE p.id_galon = g.id_galon AND k.id = p.id_konsumen ORDER BY p.tanggal DESC");
              while ($r = mysqli_fetch_array($user)) {

              ?>
                <tr class="gradeC">
                  <td><?= $r['tanggal'] ?></td>
                  <td><?= $r['nama_konsumen'] ?></td>
                  <td><?= $r['jenis'] ?></td>
                  <td><?= $r['harga'] ?></td>
                  <td><?= $r['qty'] ?></td>
                  <td><?= $r['qty'] * $r['harga'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>