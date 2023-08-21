<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM konsumen WHERE id = '$id'");
$r = mysqli_fetch_array($sql);
?>
<div class="content-wrapper">
    <div class="content-heading">
        <div>Histori Pembelian Konsumen<small>Data Histori</small></div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">Histori Pembelian <?= $r['nama_konsumen'] ?></div>
                </div>
                <div class="card-body">
                    <table class="table table-striped my-4 w-100">
                        <thead>
                            <tr>
                                <th data-priority="1">Tanggal Pembelian</th>
                                <th>Jenis Pembelian</th>
                                <th>Jumlah Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $pembelian = mysqli_query($con, "SELECT p.*, g.* FROM penjualan p INNER JOIN galon g ON g.id_galon = p.id_galon WHERE p.id_konsumen = '$id' ORDER BY p.tanggal DESC");
                            while ($r = mysqli_fetch_array($pembelian)) {
                            ?>
                                <tr class="gradeC">
                                    <td><?= $r['tanggal'] ?></td>
                                    <td><?= $r['jenis'] ?></td>
                                    <td><?= $r['qty'] ?> Galon</td>
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