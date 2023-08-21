<div class="content-wrapper">
    <div class="content-heading">
        <div>Broadcast SMS<small>Kirim SMS</small></div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">Broadcast SMS</div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fa fa-info"></i> Tampilkan data konsumen terakhir pembelian dalam beberapa hari sejak hari terakhir pembelian.
                    </div>
                    <form action="" method="POST">
                        <label for="">Masukan Jumlah Hari</label>
                        <input type="number" class="form-control" name="hari" placeholder="Masukan Jumlah Hari" required>
                        <hr>
                        <button class="btn btn-labeled btn-success mb-2" type="submit" name="proses">
                            <span class="btn-label"><i class="fa fa-save"></i></span>Proses
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['proses'])) {

            $hari = $_POST['hari'];

        ?>
            <div class="col-xl-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">Data Pengguna</div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            Berikut adalah data pelanggan yang belum melakukan pembelian air dalam <?= $hari ?> hari atau lebih terakhir sejak hari terakhir transaksi
                        </div>
                        <a href="index?page=send_sms&day=<?= $hari ?>" class="btn btn-labeled btn-success mb-2" onclick="return confirm('Kirim SMS untuk semua pelanggan ini?')">
                            <span class="btn-label"><i class="fa fa-check"></i></span>Send SMS</a>
                        <table class="table table-striped my-4 w-100" id="datatable1">
                            <thead>
                                <tr>
                                    <th data-priority="1">No</th>
                                    <th>Telp</th>
                                    <th>Nama Konsumen</th>
                                    <th>Terakhir Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $user = mysqli_query($con, "SELECT MAX(p.id_penjualan), p.tanggal, k.* FROM penjualan p INNER JOIN konsumen k ON k.id = p.id_konsumen GROUP BY p.id_konsumen");
                                while ($r = mysqli_fetch_array($user)) {

                                    $now = time(); // or your date as well
                                    $your_date = strtotime($r['tanggal']);
                                    $datediff = $now - $your_date;
                                    $rentang = round($datediff / (60 * 60 * 24));

                                    if ($rentang >= $hari) {
                                ?>
                                        <tr class="gradeC">
                                            <td><?= $no ?></td>
                                            <td><?= $r['telp'] ?></td>
                                            <td><?= $r['nama_konsumen'] ?></td>
                                            <td><?= $r['tanggal'] ?> (<?= $rentang ?> Hari Lalu)</td>
                                        </tr>
                                <?php
                                    }
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>