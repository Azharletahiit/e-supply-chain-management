<?php
session_start();

if (empty($_SESSION['username'])) {
   echo "<meta http-equiv='refresh' content='0; url=login'>";
} else {
   require_once 'inc/koneksi.php';
   require_once 'inc/skoring.php';
   require_once 'inc/fungsi.php';
   $tahun = date("Y");

   $user = $_SESSION['username'];
   $level = $_SESSION['level'];
   $nama = $_SESSION['nama'];

   $td = $_POST['dari_tanggal'];
   $ts = $_POST['sampai_tanggal'];

   $td1 = date_create($td);
   $ts1 = date_create($ts);

   $tgl_dari = date_format($td1, "Y-m-d");
   $tgl_sampai = date_format($ts1, "Y-m-d");


   $sql = "SELECT * FROM pengeluaran WHERE tanggal BETWEEN '$tgl_dari' AND '$tgl_sampai' ORDER BY tanggal ASC";


?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="icon" type="image/png" href="img/drop.png">
      <title>Air Galon Aidil</title>
      <!-- FONT AWESOME-->
      <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/brands.css">
      <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/regular.css">
      <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/solid.css">
      <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/fontawesome.css"><!-- SIMPLE LINE ICONS-->
      <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
      <!-- ANIMATE.CSS-->
      <link rel="stylesheet" href="vendor/animate.css/animate.css">
      <!-- WHIRL (spinners)-->
      <link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
      <!-- =============== PAGE VENDOR STYLES ===============-->
      <link rel="stylesheet" href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">
      <link rel="stylesheet" href="vendor/datatables.net-keytable-bs/css/keyTable.bootstrap.css">
      <link rel="stylesheet" href="vendor/datatables.net-responsive-bs/css/responsive.bootstrap.css">
      <link rel="stylesheet" href="vendor/chosen-js/chosen.css">
      <!-- =============== BOOTSTRAP STYLES ===============-->
      <link rel="stylesheet" href="css/bootstrap.css" id="bscss">
      <!-- =============== APP STYLES ===============-->
      <link rel="stylesheet" href="css/app.css" id="maincss">
      <link rel="stylesheet" href="css/theme-e.css" id="maincss">
      <link rel="stylesheet" href="vendor/sweetalert/sweetalert2.min.css">
      <script src="vendor/sweetalert/sweetalert2.min.js"></script>

   </head>

   <body class="bg-white">
      <div class="content-wrapper">
         <div class="row pt-5">
            <div class="col-xl-12 text-center">
               <img src="img/aidil.png" class="img-fluid" alt="jantan" width="300">
               <p></p>
               <p></p>
               <h3>LAPORAN PENGELUARAN </h3>
               <h4>Periode <?php echo "$tgl_dari Sampai Dengan $tgl_sampai"; ?></h4>
            </div>
         </div>
         <div class="row p-2">
            <div class="col-xl-12">
               <table class="table table-striped table-bordered my-4 w-100">
                  <thead>
                     <tr>
                        <th>TANGGAL</th>
                        <th>JENIS PENGELUARAN</th>
                        <th>SUB TOTAL</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $tgl = date("Y-m-d");
                     //$user = mysqli_query($con,"SELECT p.*, g.* FROM penjualan p, galon g WHERE p.id_galon = g.id_galon AND p.tanggal = '$tgl'");
                     $query = mysqli_query($con, $sql);
                     $sub = 0;
                     while ($r = mysqli_fetch_array($query)) {
                     ?>
                        <tr class="gradeC">
                           <td><?= $r['tanggal'] ?></td>
                           <td><?= $r['jenis'] ?></td>
                           <td><?= $r['total'] ?></td>
                        </tr>
                     <?php
                        $sub += $r['total'];
                     }
                     ?>
                  </tbody>
                  <tfoot>
                     <th colspan="2">TOTAL PENGELUARAN</th>
                     <th>Rp. <?= $sub ?></th>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
      <!-- Datatables-->
      <script src="vendor/datatables.net/js/jquery.dataTables.js"></script>
      <script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
      <script src="vendor/datatables.net-buttons/js/dataTables.buttons.js"></script>
      <script src="vendor/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
      <script src="vendor/datatables.net-buttons/js/buttons.colVis.js"></script>
      <script src="vendor/datatables.net-buttons/js/buttons.flash.js"></script>
      <script src="vendor/datatables.net-buttons/js/buttons.html5.js"></script>
      <script src="vendor/datatables.net-buttons/js/buttons.print.js"></script>
      <script src="vendor/datatables.net-keytable/js/dataTables.keyTable.js"></script>
      <script src="vendor/datatables.net-responsive/js/dataTables.responsive.js"></script>
      <script src="vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

      <script src="js/app.js"></script>
      <script>
         //window.print();
      </script>
   </body>

   </html>
<?php } ?>