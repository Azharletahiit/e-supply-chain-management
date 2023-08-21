<aside class="aside-container">
   <!-- START Sidebar (left)-->
   <div class="aside-inner">
      <nav class="sidebar" data-sidebar-anyclick-close="">
         <!-- START sidebar nav-->
         <ul class="sidebar-nav">
            <!-- START user info-->
            <li class="has-user-block">
               <div id="user-block">
                  <div class="item user-block">
                     <!-- User picture-->
                     <div class="user-block-picture">
                        <div class="user-block-status"><img class="img-thumbnail rounded-circle" src="img/user/02.jpg" alt="Avatar" width="60" height="60">
                           <div class="circle bg-success circle-lg"></div>
                        </div>
                     </div><!-- Name and Job-->
                     <div class="user-block-info"><span class="user-block-name">Hello, <?= $nama ?></span><span class="user-block-role"><?= $level ?></span></div>
                  </div>
               </div>
            </li>

            <!-- END user info-->
            <!-- Iterates over all sidebar items-->
            <li class=" ">
               <a href="index?page=home" title="Dashboard">
                  <em class="fa fa-home"></em><span data-localize="sidebar.nav.Dashboard"> Dashboard</span>
               </a>
            </li>
            <?php if ($level == "Admin") : ?>
               <li class="">
                  <a href="#pages" title="Input Data Master" data-toggle="collapse">
                     <em class="fa fa-laptop"></em>
                     <span data-localize="sidebar.nav.pages.DATAMASTER"> Data Master</span>
                     <em class="fa fa-angle-down" style="float: right;"></em>
                  </a>
                  <ul class="sidebar-nav sidebar-subnav collapse" id="pages">
                     <li class="">
                        <a href="index?page=master_galon" title="Menu Penjualan">
                           <span data-localize="sidebar.nav.pages.GALON">Menu Penjualan</span>
                        </a>
                     </li>
                     <li class=" "><a href="index?page=master_konsumen" title="Konsumen">
                           <span data-localize="sidebar.nav.pages.KONSUMEN">Master Konsumen</span></a>
                     </li>
                     <li class=" "><a href="index?page=master_pengguna" title="Master Pengguna">
                           <span data-localize="sidebar.nav.pages.PENGGUNA">Master Pengguna</span></a>
                     </li>
                     <li class=" "><a href="index?page=master_supplier" title="Master Supplier">
                           <span data-localize="sidebar.nav.pages.SUPPLIER">Master Supplier</span></a>
                     </li>

                  </ul>
               </li>
            <?php endif ?>
            <li class=" ">
               <a href="#mixing" title="Mixing" data-toggle="collapse">
                  <em class="fa fa-shopping-basket"></em>
                  <span data-localize="sidebar.nav.Transaksi">Transaksi</span>
                  <em class="fa fa-angle-down" style="float: right;"></em>
               </a>
               <ul class="sidebar-nav sidebar-subnav collapse" id="mixing">
                  <li class=" "><a href="index?page=penjualan" title="Penjualan">
                        <span data-localize="sidebar.nav.pages.PENJUALAN">Penjualan</span></a>
                  </li>
                  <?php if ($level == "Admin") : ?>
                     <li class=" "><a href="index?page=pengeluaran" title="Pengeluaran">
                           <span data-localize="sidebar.nav.pages.PENGELUARAN">Pengeluaran</span></a>
                     </li>
                     <li class=" "><a href="index?page=galon_masuk" title="Galon Masuk">
                           <span data-localize="sidebar.nav.pages.GALONMASUK">Air dan Galon Masuk</span></a>
                     </li>
                     <li class=" "><a href="index?page=broadcast_sms" title="Broadcast SMS">
                           <span data-localize="sidebar.nav.pages.BROADCASTSMS">SMS & Whatsapp</span></a>
                     </li>
                  <?php endif ?>
               </ul>
            </li>
            <?php if ($level == "Admin") : ?>
               <li class=" ">
                  <a href="#laporan" title="Mixing" data-toggle="collapse">
                     <em class="fa fa-chart-bar"></em>
                     <span data-localize="sidebar.nav.LAPORAN">Laporan</span>
                     <em class="fa fa-angle-down" style="float: right;"></em>
                  </a>
                  <ul class="sidebar-nav sidebar-subnav collapse" id="laporan">
                     <li class=" "><a href="index?page=lap_penjualan" title="Penjualan">
                           <span data-localize="sidebar.nav.pages.LAPPENJUALAN">Lap Penjualan</span></a>
                     </li>
                     <li class=" "><a href="index?page=lap_pengeluaran" title="Pengeluaran">
                           <span data-localize="sidebar.nav.pages.LAPPENGELUARAN">Lap Pengeluaran</span></a>
                     </li>
                     <li class=" "><a href="index?page=lap_galon_masuk" title="Galon_Masuk">
                           <span data-localize="sidebar.nav.pages.LAPGALONMASUK">Lap Pembelian</span></a>
                     </li>
                  </ul>
               </li>
            <?php endif ?>
         </ul>
         <!-- END sidebar nav-->
      </nav>
   </div><!-- END Sidebar (left)-->
</aside><!-- offsidebar-->