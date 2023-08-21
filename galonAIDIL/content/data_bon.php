<?php
$tanggal = date("d-m-Y");
?>

<div class="content-wrapper">
   <div class="content-heading">
      <div>Transaksi<small>Data Bon</small></div>
   </div>
   <div class="row">
      <div class="col-xl-12">
         <div class="card card-default">
            <div class="card-header">
               <div class="card-title">Data Bon</div>
            </div>
            <div class="card-body">
               <table class="table table-striped my-4 w-100" id="datatable1">
                  <thead>
                     <tr>
                        <th data-priority="1">Tanggal</th>
                        <th>Konsumen</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $tgl = date("d-m-Y");
                     $user = mysqli_query($con, "SELECT p.*, g.*, k.* FROM penjualan p, galon g, konsumen k WHERE p.id_galon = g.id_galon AND k.id = p.id_konsumen AND p.status = '0' ");
                     while ($r = mysqli_fetch_array($user)) {

                        $dd = date_create($r['tanggal']);
                        $tt = date_format($dd, "d M Y");

                     ?>
                        <tr class="gradeC">
                           <td><?= $tt ?></td>
                           <td><?= $r['nama_konsumen'] ?></td>
                           <td><?= $r['qty'] ?></td>
                           <td><?= $r['qty'] * $r['harga'] ?></td>
                           <td>
                              <a href="index?page=bon_lunas&kode=<?= $r['id_penjualan'] ?>" class="btn btn-xs btn-warning" onclick="return confirm('Sudah Lunas?')"><i class="fa fa-check"></i> Lunas?</a>
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