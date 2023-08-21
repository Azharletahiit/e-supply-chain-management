<?php
function sendSMS($nohp, $pesan)
{
    $urlserver = "https://sms255.xyz/";
    $user = "subenk";
    $apikey = "6a93427857c48ecb15b791e0e3ca43fd";

    $url = $urlserver . "/sms/smsmasking.php?username=" . urlencode($user) . "&key=" . urlencode($apikey) . "&number=" . urlencode($nohp) . "&message=" . urlencode($pesan);

    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, $url);
    curl_setopt($curlHandle, CURLOPT_HEADER, 0);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlHandle, CURLOPT_TIMEOUT, 10);
    $respon = curl_exec($curlHandle);
    curl_close($curlHandle);
    if (substr($respon, 0, 1) == '0') {
        echo "<span class='text-success'>SMS Telah Dikirim <br> $respon </span>";
    } else {
        echo "<span class='text-warning'>Gagal Mengirim SMS <br> $respon </span>";
    }
}
