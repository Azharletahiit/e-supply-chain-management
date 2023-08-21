<div class="content-wrapper">
   <div class="content-heading">
      <div>Master Konsumen<small>Data Konsumen</small></div>
   </div>
   <div class="row">
      <div class="col-xl-12">
         <div class="card card-default">
            <div class="card-header">
               <div class="card-title">Master Konsumen</div>
            </div>
            <div class="card-body">
               <form action="index?page=master_konsumen_save" method="POST">
                  <label for="">Nama Konsumen</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Konsumen" required>
                  <label for="">Nomor Telepon</label>
                  <input type="text" class="form-control" name="telp" placeholder="Masukan Nomor Telepon" required>
                  <label for="">Tanggal Masuk</label>
                  <input type="date" class="form-control" name="tgl_masuk" placeholder="Masukan Nama Konsumen" required>
                  <label for="">Keterangan</label>
                  <input type="text" class="form-control" name="ket" placeholder="Masukan Keterangan Jika Ada" required>
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
               <div class="card-title">Data Pengguna</div>
            </div>
            <div class="card-body">
               <table class="table table-striped my-4 w-100" id="datatable1">
                  <thead>
                     <tr>
                        <th data-priority="1">No</th>
                        <th>Telp</th>
                        <th>Nama Konsumen</th>
                        <th>Tanggal Masuk</th>
                        <th class="sort-numeric">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     $user = mysqli_query($con, "SELECT * FROM konsumen");
                     while ($r = mysqli_fetch_array($user)) {

                     ?>
                        <tr class="gradeC">
                           <td><?= $no ?></td>
                           <td><?= $r['telp'] ?></td>
                           <td><?= $r['nama_konsumen'] ?></td>
                           <td><?= $r['tgl_masuk'] ?></td>
                           <td>
                              <a href="index?page=master_konsumen_histori&id=<?= $r[0] ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i> Histori</a>
                              <a href="index?page=delete&id=<?= $r[0] ?>&t=konsumen" class="btn btn-danger btn-xs" onclick='return confirm("Hapus Konsumen?")'><i class="fa fa-trash"></i></a>
                              <a href="index?page=master_konsumen_edit&id=<?= $r[0] ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                           </td>
                        </tr>
                     <?php $no++;
                     } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>