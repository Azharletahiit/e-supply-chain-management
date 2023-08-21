<div class="content-wrapper">
   <div class="content-heading">
      <div>Master User<small>Data Jenis User</small></div>
   </div>
   <div class="row">
      <div class="col-xl-12">
         <div class="card card-default">
            <div class="card-header">
               <div class="card-title">Master Pengguna</div>
            </div>
            <div class="card-body">
               <form action="index?page=master_pengguna_save" method="POST">
                  <label for="">Nama Pengguna</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Pengguna" required>
                  <label for="">Username</label>
                  <input type="username" class="form-control" name="username" placeholder="Masukan Username" required>
                  <label for="">Password</label>
                  <input type="text" class="form-control" name="password" placeholder="Masukan Password" required>
                  <label for="">Level</label>
                  <select name="level" class="form-control">
                     <option>Admin</option>
                     <option>Kasir</option>
                  </select>
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
                        <th data-priority="1">Nama Pengguna</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th class="sort-numeric">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $user = mysqli_query($con, "SELECT * FROM user");
                     while ($r = mysqli_fetch_array($user)) {

                     ?>
                        <tr class="gradeC">
                           <td><?= $r[1] ?></td>
                           <td><?= $r[2] ?></td>
                           <td><?= $r[4] ?></td>
                           <td>
                              <a href="index?page=delete&id=<?= $r[0] ?>&t=user" class="btn btn-danger btn-xs" onclick='return confirm("Hapus User?")'><i class="fa fa-trash"></i></a>
                              <a href="index?page=master_pengguna_edit&id=<?= $r[0] ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
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