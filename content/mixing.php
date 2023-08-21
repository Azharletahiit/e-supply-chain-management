<div class="content-wrapper">
  <div class="content-heading">
    <div>Mixing<small>Mixing Calon Camat</small></div>
  </div>
  <div class="row">
    <div class="col-xl-12">
      <div class="card card-default">
        <div class="card-body">
          <form action="" method="POST" class="form-horizontal pr-5 pl-5">
            <div class="form-group row m-2">
              <label for="" class="col-lg-2 text-right">Pilih Kabupaten Kota</label>
              <div class="col-lg-5">
                <select class="custom-select custom-select-sm" name="kab">
                  <?php
                  $kabkota = mysqli_query($con, "SELECT * FROM kabkota");
                  while ($kk = mysqli_fetch_array($kabkota)) {

                  ?>
                    <option><?= $kk[1] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-lg-3 ml-0">
                <button class="btn btn-labeled btn-success" type="submit">
                  <span class="btn-label"><i class="fa fa-check"></i></span>Load Data
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  <?php
  if (isset($_POST['kab'])) {
    $kab = $val->validasi($_POST['kab'], 'xss');
    $h = "";

    $queri1 = mysqli_query($con, "SELECT * FROM pns WHERE daerah = '$kab'");
    $queri2 = mysqli_query($con, "SELECT * FROM pns WHERE daerah = '$kab'");
    $queri3 = mysqli_query($con, "SELECT * FROM pns WHERE daerah = '$kab'");

    if ($kab == "Ambon" || $kab == "Tual") {
      $h = "Kota";
    } else {
      $h = "Kabupaten";
    }
  ?>
    <div class="row mb-5 mt-2">
      <div class="col-xl-8">
        <div class="card card-default">
          <div class="card-header text-center mt-5">
            <h3>Mixing Calon Camat <?= $h . " " . $kab ?></h3>
          </div>
          <div class="card-body">
            <form action="index?page=detail_mixing" method="POST">
              <div class="form-group row text-center">
                <div class="alert alert-info col-lg-10 offset-1">
                  <i class="fa fa-info"></i> Silahkan Memilih 3 Kandidat. Data Camat yang ditampilkan adalah camat yang mempunyai Skor > 90
                </div>
              </div>
              <div class="form-group row">
                <label class="form-control-label col-lg-3 text-right">Kecamatan</label>
                <div class="col-lg-8">
                  <input type="hidden" value="<?= $kab ?>" name="daerah">
                  <input type="text" class="form-control" name="kecamatan" placeholder="Isi Nama Kecamatan" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="form-control-label col-lg-3 text-right">Kandidat 1</label>
                <div class="col-lg-8">
                  <select class="form-control" name="kan1" id="select2-kan1">
                    <?php
                    while ($k1 = mysqli_fetch_array($queri1)) {
                      $tmtTahun = masaPangkatTahun($k1[4]);
                      $masaJabatan = date("Y") - $k1[8];

                      $skor1 = skorPendidikan($k1[5]);
                      $skor2 = skorPangkat($k1[3], $tmtTahun);
                      $skor3 = skorJabatan($k1[7], $masaJabatan);

                      $total = ($skor1 * 0.5) + ($skor2 * 0.3) + ($skor3 * 0.2);
                      if ($total >= 10) {
                        echo "<option value='$k1[0]'>$k1[2] ($total)</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="form-control-label col-lg-3 text-right">Kandidat 2</label>
                <div class="col-lg-8">
                  <select class="form-control" name="kan2" id="select2-kan2">
                    <?php
                    while ($k2 = mysqli_fetch_array($queri2)) {
                      $tmtTahun = masaPangkatTahun($k2[4]);
                      $masaJabatan = date("Y") - $k2[8];

                      $skor1 = skorPendidikan($k2[5]);
                      $skor2 = skorPangkat($k2[3], $tmtTahun);
                      $skor3 = skorJabatan($k2[7], $masaJabatan);

                      $total = ($skor1 * 0.5) + ($skor2 * 0.3) + ($skor3 * 0.2);
                      if ($total >= 10) {
                        echo "<option value='$k2[0]'>$k2[2] ($total)</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="form-control-label col-lg-3 text-right">Kandidat 3</label>
                <div class="col-lg-8">
                  <select class="form-control" name="kan3" id="select2-kan3">
                    <?php
                    while ($k3 = mysqli_fetch_array($queri3)) {
                      $tmtTahun = masaPangkatTahun($k3[4]);
                      $masaJabatan = date("Y") - $k3[8];

                      $skor1 = skorPendidikan($k3[5]);
                      $skor2 = skorPangkat($k3[3], $tmtTahun);
                      $skor3 = skorJabatan($k3[7], $masaJabatan);

                      $total = ($skor1 * 0.5) + ($skor2 * 0.3) + ($skor3 * 0.2);
                      if ($total >= 10) {
                        echo "<option value='$k3[0]'>$k3[2] ($total)</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12 offset-3">
                  <button class="btn btn-success btn-labeled" type="submit">
                    <span class="btn-label"><i class="fa fa-check"></i></span>Proses
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>