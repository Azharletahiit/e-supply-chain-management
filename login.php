<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="sistem pengisian jabatan camat">
   <meta name="keywords" content="sipejantan">
   <link rel="icon" type="image/png" href="img/drop.png">
   <title>Login Page - Air Galon H2T</title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/brands.css">
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/regular.css">
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/solid.css">
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/fontawesome.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="css/app.css" id="maincss">
   <link rel="stylesheet" href="vendor/sweetalert/sweetalert2.min.css">
   <script src="vendor/sweetalert/sweetalert2.min.js"></script>
</head>

<body>
   <div class="wrapper">
      <div class="block-center mt-4 wd-xl">
         <!-- START card-->
         <br><br><br>
         <div class="card card-flat">
            <div class="card-header text-center bg-dark"><a href="#"><img class="block-center rounded img-fluid" src="img/aidil-white.png" alt="Image" width="150"></a></div>
            <div class="card-body">
               <img src="" alt="">
               <p class="text-center py-2">LOG IN TO ENTER THE APP.</p>
               <form class="mb-3" id="loginForm" method="POST" action="ceklogin">
                  <div class="form-group">
                     <div class="input-group with-focus"><input class="form-control border-right-0" id="exampleInputEmail1" type="text" name="user" placeholder="Enter Username" autocomplete="off" required>
                        <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-user"></em></span></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group with-focus"><input class="form-control border-right-0" id="exampleInputPassword1" type="password" name="pass" placeholder="Password" required>
                        <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-lock"></em></span></div>
                     </div>
                  </div>
                  <div class="clearfix">
                     <button class="btn btn-block btn-dark mt-3" type="submit">Login</button>
               </form>

            </div>
         </div><!-- END card-->
         <div class="p-3 text-center"><span class="mr-2">&copy;</span><strong><span>2023</span></strong><span class="mr-2"><strong></span><span>WEBSoftware</span></strong></div>
      </div>
   </div><!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="vendor/modernizr/modernizr.custom.js"></script>
   <!-- STORAGE API-->
   <script src="vendor/js-storage/js.storage.js"></script>
   <!-- i18next-->
   <script src="vendor/i18next/i18next.js"></script>
   <script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script>
   <!-- JQUERY-->
   <script src="vendor/jquery/dist/jquery.js"></script>
   <!-- BOOTSTRAP-->
   <script src="vendor/popper.js/dist/umd/popper.js"></script>
   <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
   <!-- PARSLEY-->
   <script src="vendor/parsleyjs/dist/parsley.js"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="vendor/sweetalert/dist/sweetalert.min.js"></script>
   <script src="js/app.js"></script>
</body>

</html>