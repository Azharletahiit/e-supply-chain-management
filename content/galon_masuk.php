<?php
$sql1 = mysqli_query($con, "SELECT * FROM stok WHERE id = '1'");
$stok_air = mysqli_fetch_array($sql1);

$sql2 = mysqli_query($con, "SELECT * FROM stok WHERE id = '2'");
$stok_galon = mysqli_fetch_array($sql2);
?>

<div class="content-wrapper">
  <div class="content-heading">
    <div>Galon dan Air Masuk<small>Data Galon & Air Masuk</small></div>
  </div>
  <div class="row">
    <div class="col-xl-6">
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Data Air dan Galon Masuk</div>
        </div>
        <div class="card-body">
          <form action="index?page=galon_masuk_save" method="POST">
            <div class="form-group">
              <label for="">Supplier</label>
              <select name="supplier" class="form-control">
                <option value="">-Pilih-</option>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM suplier");
                while ($r = mysqli_fetch_array($sql)) {
                  echo "<option value='$r[0]'>$r[1]</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Jenis Galon</label>
              <select name="jenis" class="form-control">
                <option>Air</option>
                <option>Galon</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Tanggal Masuk</label>
              <input type="date" class="form-control" name="tanggal" required>
            </div>
            <div class="form-group">
              <label for="">Jumlah Masuk (Lt)</label>
              <input type="number" class="form-control" name="jumlah" placeholder="Masukan Jumlah Masuk" required>
            </div>
            <hr>
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
          <div class="card-title">Setting Liter Galon</div>
        </div>
        <div class="card-body">
          <form action="index?page=setting_air_save" method="POST">
            <div class="form-group">
              <label for="">Jumlah Liter dalam 1 Galon</label>
              <input type="number" class="form-control" name="setting" placeholder="Masukan Jumlah Masuk" value="<?= $stok_air['setting'] ?>" required>
            </div>
            <hr>
            <button class="btn btn-labeled btn-success mb-2" type="submit">
              <span class="btn-label"><i class="fa fa-save"></i></span>Update
            </button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
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
        <div class="col-xl-12">
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
          <div class="card-title">Data Pembelian Air Galon / Galon Masuk</div>
        </div>
        <div class="card-body">
          <table class="table table-striped my-4 w-100" id="datatable1">
            <thead>
              <tr>
                <th data-priority="1">Tanggal</th>
                <th>Jenis</th>
                <th>Supplier</th>
                <th>Jumlah Masuk</th>
                <th class="sort-numeric">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $user = mysqli_query($con, "SELECT gm.*, s.* FROM galon_masuk gm INNER JOIN suplier s ON gm.id_supplier = s.id");
              while ($r = mysqli_fetch_array($user)) {
              ?>
                <tr class="gradeC">
                  <td><?= $r['tanggal_masuk'] ?></td>
                  <td><?= $r['jenis'] ?></td>
                  <td><?= $r['nama'] ?></td>
                  <td><?= $r['jumlah_masuk'] ?></td>
                  <td>
                    <a href="index?page=delete&id=<?= $r['id_masuk'] ?>&t=galon_masuk" class="btn btn-danger btn-xs" onclick='return confirm("Hapus Data? menghapus data ini akan mempengaruhi stok!")'><i class="fa fa-trash"></i></a>
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