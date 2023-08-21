<div class="content-wrapper">
   <div class="content-heading">
      <div>Menu Penjualan<small>Data Menu Penjualan</small></div>
   </div>
   <div class="row">
      <div class="col-xl-6">
         <div class="card card-default">
            <div class="card-header">
               <div class="card-title">Menu Penjualan</div>
            </div>
            <div class="card-body">
               <form action="index?page=master_galon_save" method="POST">
                  <label for="">Jenis Galon</label>
                  <input type="text" class="form-control" name="jenis" placeholder="Masukan Jenis Galon" required>
                  <label for="">Harga</label>
                  <input type="number" class="form-control" name="harga" placeholder="Masukan Harga" required>
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
               <div class="card-title">Data Menu Penjualan</div>

            </div>
            <div class="card-body">
               <table class="table table-striped my-4 w-100" id="datatable1">
                  <thead>
                     <tr>
                        <th data-priority="1">Jenis</th>
                        <th>Harga</th>
                        <th class="sort-numeric">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $user = mysqli_query($con, "SELECT * FROM galon");
                     while ($r = mysqli_fetch_array($user)) {

                     ?>
                        <tr class="gradeC">
                           <td><?= $r[1] ?></td>
                           <td><?= $r[2] ?></td>
                           <td>
                              <a href="index?page=delete&id=<?= $r[0] ?>&t=galon" class="btn btn-danger btn-xs" onclick='return confirm("Hapus?")'><i class="fa fa-trash"></i></a>
                              <a href="index?page=master_galon_edit&id=<?= $r[0] ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
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