<div class="content-wrapper">
    <div class="content-heading">
        <div>Master Supplier<small>Data Supplier</small></div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">Master Supplier</div>
                </div>
                <div class="card-body">
                    <form action="index?page=master_supplier_save" method="POST">
                        <label for="">Nama Supplier</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Konsumen" required>
                        <label for="">Nomor Telepon</label>
                        <input type="text" class="form-control" name="telp" placeholder="Masukan Nomor Telepon" required>
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukan Keterangan Jika Ada" required>
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
                    <div class="card-title">Data Supplier</div>
                </div>
                <div class="card-body">
                    <table class="table table-striped my-4 w-100" id="datatable1">
                        <thead>
                            <tr>
                                <th data-priority="1">No</th>
                                <th>Telp</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th class="sort-numeric">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $user = mysqli_query($con, "SELECT * FROM suplier");
                            while ($r = mysqli_fetch_array($user)) {

                            ?>
                                <tr class="gradeC">
                                    <td><?= $no ?></td>
                                    <td><?= $r['telp'] ?></td>
                                    <td><?= $r['nama'] ?></td>
                                    <td><?= $r['alamat'] ?></td>
                                    <td>
                                        <a href="index?page=delete&id=<?= $r[0] ?>&t=suplier" class="btn btn-danger btn-xs" onclick='return confirm("Hapus Supplier?")'><i class="fa fa-trash"></i></a>
                                        <a href="index?page=master_supplier_edit&id=<?= $r[0] ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
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