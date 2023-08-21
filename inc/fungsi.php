<?php
function sendSMS($nohp, $pesan)
{
    $urlserver = "https://sms114.xyz/";
    $user = "Letahiit";
    $apikey = "c000927e9f37d43852a42b0e72e2f36f";

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
