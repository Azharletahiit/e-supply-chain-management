<?php
require_once('api_sms/smsclass.php'); // panggil class  
ob_start();

// cek curl aktif atau tidak 
if (!function_exists('curl_version')) {
    echo "Curl belum aktif di server anda .....!, Aktifkan dulu....";
    exit;
}
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <?php
                    if (isset($_GET['day'])) {
                        $hari = $_GET['day'];

                        $user = mysqli_query($con, "SELECT MAX(p.id_penjualan), p.tanggal, k.* FROM penjualan p INNER JOIN konsumen k ON k.id = p.id_konsumen GROUP BY p.id_konsumen");
                        while ($r = mysqli_fetch_array($user)) {

                            $now = time(); // or your date as well
                            $your_date = strtotime($r['tanggal']);
                            $datediff = $now - $your_date;
                            $rentang = round($datediff / (60 * 60 * 24));

                            if ($rentang >= $hari) {
                                #send sms
                                $message = "Halo $r[nama_konsumen], sudah $rentang hari sejak anda membeli air, jika air anda telah habis silahkan mengunjungi Depot Aidil kami atau hubungi kami melalui Whatsapp atau Telepon untuk memesan 081247781858 . terimakasih";
                                sendSMS($r['telp'], $message);
                            }
                        }
                    }
                    ?>

                    <a href="index?page=broadcast_sms" class="btn btn-primary d-block">Kembali</a>
                </div>
            </div>
        </div>
    </div>

</div>