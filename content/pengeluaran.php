<?php
$tanggal = date("Y-m-d");
$bulan = date("m");
?>

<div class="content-wrapper">
  <div class="content-heading">
    <div>Transaksi<small>Pengeluaran</small></div>
  </div>
  <div class="row">
    <div class="col-xl-12">
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Pengeluaran</div>
        </div>
        <div class="card-body">
          <form action="index?page=pengeluaran_save" method="POST">
            <div class="form-group">
              <label for="">Tanggal</label>
              <input type="hidden" value="<?= $userdata[0] ?>" name="user">
              <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label for="">Jenis Pengeluaran</label>
                <select name="jenis" class="form-control">
                  <option>Gaji Pegawai</option>
                  <option>Pembelian Air Waiseri</option>
                  <option>Uang Pulang Karyawan</option>
                  <option>Keperluan Dalam Rumah</option>
                  <option>Lain-Lain</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="">Total Pengeluaran</label>
                <input type="number" class="form-control" name="total" placeholder="0" required>
              </div>
            </div>
            <div class="form-group">
              <label for="">Keterangan</label>
              <textarea name="keterangan" class="form-control" placeholder="Masukan Keterangan" required></textarea>
            </div>
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
          <div class="card-title">Pengeluaran Bulan ini</div>
        </div>
        <div class="card-body">
          <table class="table table-striped my-4 w-100" id="datatable1">
            <thead>
              <tr>
                <th data-priority="1">Tanggal</th>
                <th>Jenis Pengeluaran</th>
                <th>Total</th>
                <th>Keterangan</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $user = mysqli_query($con, "SELECT * FROM pengeluaran WHERE tanggal LIKE '%-$bulan-%' ORDER BY tanggal DESC");
              while ($r = mysqli_fetch_array($user)) {

              ?>
                <tr class="gradeC">
                  <td><?= $r['tanggal'] ?></td>
                  <td><?= $r['jenis'] ?></td>
                  <td><?= $r['total'] ?></td>
                  <td><?= $r['keterangan'] ?></td>
                  <td>
                    <a href="index?page=delete&id=<?= $r[0] ?>&t=pengeluaran" class="btn btn-danger btn-xs" onclick='return confirm("Hapus?")'><i class="fa fa-trash"></i></a>
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