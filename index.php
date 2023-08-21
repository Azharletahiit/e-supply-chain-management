<?php
session_start();

if (empty($_SESSION['username'])) {
   echo "<meta http-equiv='refresh' content='0; url=login'>";
} else {
   require_once 'inc/koneksi.php';
   $tahun = date("Y");

   $user = $_SESSION['username'];
   $level = $_SESSION['level'];
   $nama = $_SESSION['nama'];

   //cari data user
   $caridata = mysqli_query($con, "SELECT * FROM user WHERE username = '$user'");
   $userdata = mysqli_fetch_array($caridata);


?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="icon" type="image/png" href="img/drop.png">
      <title>Aidil - Air Isi Ulang</title>
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
      <link rel="stylesheet" href="vendor/select2/dist/css/select2.css">
      <link rel="stylesheet" href="vendor/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.css">
      <!-- =============== BOOTSTRAP STYLES ===============-->
      <link rel="stylesheet" href="css/bootstrap.css" id="bscss">
      <!-- =============== APP STYLES ===============-->
      <link rel="stylesheet" href="css/app.css" id="maincss">
      <link rel="stylesheet" href="css/theme-a.css" id="maincss">
      <link rel="stylesheet" href="vendor/sweetalert/sweetalert2.min.css">
      <script src="vendor/sweetalert/sweetalert2.min.js"></script>

   </head>

   <body class="layout-fixed">
      <div class="wrapper">
         <!-- top navbar-->
         <header class="topnavbar-wrapper">
            <!-- START Top Navbar-->
            <nav class="navbar topnavbar">
               <!-- START navbar header-->
               <div class="navbar-header"><a class="navbar-brand" href="#/">
                     <div class="brand-logo"><img class="img-fluid" src="img/aidil-white.png" alt="App Logo" width="100"></div>
                     <div class="brand-logo-collapsed"><img class="img-fluid" src="h2t-alt.png" alt="App Logo"></div>
                  </a></div><!-- END navbar header-->
               <!-- START Left navbar-->
               <ul class="navbar-nav mr-auto flex-row">

               </ul><!-- END Left navbar-->
               <!-- START Right Navbar-->
               <ul class="navbar-nav flex-row">
                  <!-- START Alert menu-->
                  <li class="nav-item dropdown dropdown-list"><a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown">
                        <em class="icon-user"></em> &nbsp; <?= $user ?> &nbsp; <em class="fa fa-angle-down text-right"></em></a>
                     <!-- START Dropdown menu-->
                     <div class="dropdown-menu dropdown-menu-right animated flipInX">
                        <div class="dropdown-item">
                           <!-- START list group-->
                           <div class="list-group">
                              <!-- list item-->
                              <div class="list-group-item list-group-item-action">
                                 <div class="media">
                                    <div class="align-self-start mr-2"><em class="icon-settings fa-2x text-info"></em></div>
                                    <div class="media-body">
                                       <a href="index?page=setting" class="m-0">Setting</a>
                                       <p class="m-0 text-muted text-sm">Ganti Password</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="list-group-item list-group-item-action">
                                 <div class="media">
                                    <div class="align-self-start mr-2"><em class="icon-logout fa-2x text-info"></em></div>
                                    <div class="media-body">
                                       <a href="logout" class="m-0">Logout</a>
                                       <p class="m-0 text-muted text-sm">Keluar Aplikasi</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- END list group-->
                        </div>
                     </div>
                     <!-- END Dropdown menu-->
                  </li>
                  <!-- END Alert menu-->
               </ul>
               <!-- END Right Navbar-->
               <!-- START Search form-->
               <form class="navbar-form" role="search" action="search.html">
                  <div class="form-group"><input class="form-control" type="text" placeholder="Type and hit enter ...">
                     <div class="fas fa-times navbar-form-close" data-search-dismiss=""></div>
                  </div><button class="d-none" type="submit">Submit</button>
               </form><!-- END Search form-->
            </nav><!-- END Top Navbar-->
         </header><!-- sidebar-->
         <?php include("inc/menu.php"); ?>

         <section class="section-container">
            <!-- Page content-->
            <?php
            $direktori = "content";
            $page = @$_GET['page'];
            if ($page != "") {
               include("$direktori/$page.php");
            } else {
               include("$direktori/home.php");
            }
            ?>
         </section>
         <!-- Page footer-->
         <footer class="footer-container"><strong><span>&copy; 2023 - Azhar Letahiit </span></strong></footer>
      </div>
      <!-- =============== VENDOR SCRIPTS ===============-->
      <!-- MODERNIZR-->
      <script src="vendor/modernizr/modernizr.custom.js"></script>
      <!-- STORAGE API-->
      <script src="vendor/js-storage/js.storage.js"></script>
      <!-- SCREENFULL-->
      <script src="vendor/screenfull/dist/screenfull.js"></script>
      <!-- i18next-->
      <script src="vendor/i18next/i18next.js"></script>
      <script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script>
      <script src="vendor/jquery/dist/jquery.js"></script>
      <script src="vendor/popper.js/dist/umd/popper.js"></script>
      <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
      <!-- =============== PAGE VENDOR SCRIPTS ===============-->
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
      <script src="vendor/jszip/dist/jszip.js"></script>
      <script src="vendor/pdfmake/build/pdfmake.js"></script>
      <script src="vendor/pdfmake/build/vfs_fonts.js"></script>

      <script src="vendor/jquery-validation/dist/jquery.validate.js"></script>
      <script src="vendor/jquery-validation/dist/additional-methods.js"></script><!-- JQUERY STEPS-->
      <script src="vendor/jquery-steps/build/jquery.steps.js"></script>
      <!-- =============== APP SCRIPTS ===============-->
      <script src="vendor/bootstrap-filestyle/src/bootstrap-filestyle.js"></script>
      <!-- TAGS INPUT-->
      <script src="vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
      <!-- CHOSEN-->
      <script src="vendor/chosen-js/chosen.jquery.js"></script>
      <script src="vendor/chart.js/dist/Chart.js"></script>
      <script src="vendor/select2/dist/js/select2.full.js"></script>
      <script src="js/app.js"></script>
      <script src="data.js"></script>
      <script>
         $(document).ready(function() {

            $("#jumlah,#harga").keyup(function() {
               var jml = $(this).parent().find('#jumlah').val();
               var harga = $(this).parent().find('#harga').val();

               $(this).parent().find('#total').val(jml * harga);
            });


            //select
            $("#kode").change(function() {
               var kode = $("#kode").val();

               //lakukan pengiriman data
               $.ajax({
                  url: "inc/getdata.php",
                  data: "op=ambildata&kode_galon=" + kode,
                  cache: false,
                  success: function(data) {
                     //alert(data);
                     var dataa = data;

                     //masukan isi data ke masing - masing field
                     $("#harga").val(dataa);
                     $("#jumlah").focus();
                     //hilangkan status animasi dan loading
                     $("#status").html("");
                     $("#loading").hide();

                  }
               });
            });


         });
      </script>
   </body>

   </html>
<?php } ?>