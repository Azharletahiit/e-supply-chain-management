<?php
$today = date("Y-m-d");
$bulan = date("m");

//cari stok
$sql1 = mysqli_query($con, "SELECT SUM(stok) FROM stok WHERE jenis = 'Air'");
$data1 = mysqli_fetch_array($sql1);

//penjualan hari ini
$sql2 = mysqli_query($con, "SELECT SUM(p.qty * g.harga) FROM galon g, penjualan p WHERE p.id_galon = g.id_galon AND p.tanggal = '$today'");
$data2 = mysqli_fetch_array($sql2);

//penjualan bulan ini
$sql3 = mysqli_query($con, "SELECT SUM(p.qty * g.harga) FROM galon g, penjualan p WHERE p.id_galon = g.id_galon AND p.tanggal LIKE '%-$bulan-%'");
$data3 = mysqli_fetch_array($sql3);

//pengeluaran bulan ini
$sql4 = mysqli_query($con, "SELECT SUM(total) FROM pengeluaran WHERE tanggal LIKE '%-$bulan-%'");
$data4 = mysqli_fetch_array($sql4);

//get date month
$dataPoints = array();

for ($d = 1; $d <= 31; $d++) {
   $time = mktime(12, 0, 0, date('m'), $d, date('Y'));
   if (date('m', $time) == date('m')) {

      $tgl = date('Y-m-d', $time);
      $xdata = mysqli_query($con, "SELECT SUM(p.qty * g.harga) as total FROM galon g, penjualan p WHERE p.id_galon = g.id_galon AND p.tanggal = '$tgl'");
      $xrow = mysqli_fetch_array($xdata);

      $dataPoints[] = [
         "y" => $xrow['total'],
         "label" => $tgl
      ];
   }
}

// echo "<pre>";
// var_dump($dataPoints);
// echo "</pre>";
?>

<script>
   window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
         theme: "light2",
         title: {
            text: ""
         },
         axisY: {
            title: ""
         },
         data: [{
            color: "#4287f5",
            type: "line",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
         }]
      });
      chart.render();

   }
</script>
<div class="content-wrapper">
   <div class="content-heading">
      <div>Dashboard<small>Halaman Home</small></div>
   </div>
   <div class="row">
      <div class="col-xl-3">
         <!-- START card-->
         <div class="card border-0">
            <div class="row row-flush">
               <div class="col-4 bg-info text-center d-flex align-items-center justify-content-center rounded-left"><em class="fa fa-tint fa-2x"></em></div>
               <div class="col-8">
                  <div class="card-body text-center">
                     <h4 class="mt-0"><?= $data1[0] ?> Liter</h4>
                     <p class="mb-0 text-muted">Stok Air</p>
                  </div>
               </div>
            </div>
         </div><!-- END card-->
      </div>
      <div class="col-xl-3">
         <!-- START card-->
         <div class="card border-0">
            <div class="row row-flush">
               <div class="col-4 bg-danger text-center d-flex align-items-center justify-content-center rounded-left"><em class="fa fa-dollar-sign fa-2x"></em></div>
               <div class="col-8">
                  <div class="card-body text-center">
                     <h4 class="mt-0">Rp. <?= $data2[0] ?></h4>
                     <p class="mb-0 text-muted">Penjualan Hari Ini</p>
                  </div>
               </div>
            </div>
         </div><!-- END card-->
      </div>
      <div class="col-xl-3">
         <!-- START card-->
         <div class="card border-0">
            <div class="row row-flush">
               <div class="col-4 bg-inverse text-center d-flex align-items-center justify-content-center rounded-left"><em class="fas fa-dollar-sign fa-2x"></em></div>
               <div class="col-8">
                  <div class="card-body text-center">
                     <h4 class="mt-0">Rp. <?= $data3[0] ?></h4>
                     <p class="mb-0 text-muted">Penjualan Bulan Ini</p>
                  </div>
               </div>
            </div>
         </div><!-- END card-->
      </div>
      <div class="col-xl-3">
         <!-- START card-->
         <div class="card border-0">
            <div class="row row-flush">
               <div class="col-4 bg-green text-center d-flex align-items-center justify-content-center rounded-left"><em class="fa fa-money-bill fa-2x"></em></div>
               <div class="col-8">
                  <div class="card-body text-center">
                     <h4 class="mt-0">Rp. <?= $data4[0] ?></h4>
                     <p class="mb-0 text-muted">Pengeluaran Bulan Ini</p>
                  </div>
               </div>
            </div>
         </div><!-- END card-->
      </div>
   </div>

   <div class="row">
      <div class="col-xl-12">
         <div class="alert alert-info">
            <i class="fa fa-info"></i> Selamat Datang <?= $user ?> Anda Login Sebagai User <?= $level ?>
         </div>
      </div>
      <div class="col-xl-12">
         <div class="card card-default">
            <div class="card-header">
               <div class="card-title">Grafik Penjualan Bulan Ini</div>
            </div>
            <div class="card-body">
               <div id="chartContainer" style="height: 370px; width: 100%;"></div>

            </div>
         </div>
      </div>
      <div class="col-xl-12">
         <div class="card card-default">
            <div class="card-header">
               <div class="card-title">Data Penjualan Galon Hari Ini</div>
            </div>
            <div class="card-body">
               <table class="table table-striped my-4 w-100" id="datatable1">
                  <thead>
                     <tr>
                        <th data-priority="1">Tanggal</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $tgl = date("Y-m-d");
                     $user = mysqli_query($con, "SELECT p.*, g.* FROM penjualan p, galon g WHERE p.id_galon = g.id_galon AND p.tanggal = '$tgl'");
                     while ($r = mysqli_fetch_array($user)) {

                     ?>
                        <tr class="gradeC">
                           <td><?= $r['tanggal'] ?></td>
                           <td><?= $r['jenis'] ?></td>
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

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>