<?php
ob_start();
// setting 

$urlendpoint = 'https://your_url_endpoint_api'; // url endpoint api
$apikey      = 'c000927e9f37d43852a42b0e72e2f36f'; // api key 
$waid        = ''; // whatsapp id 

// create header json  
$senddata = array(
	'apikey' => $apikey,  
	'waid' => $waid, 
	'datapacket'=>array()
);

// create detail data json 
// data 1
$number='6281xxxxx';
$message='Message 1';
array_push($senddata['datapacket'],array(
	'number' => trim($number),
	'message' => $message
));
// data 1
$number2='6281xxxxx';
$message2='Message 2';
array_push($senddata['datapacket'],array(
	'number' => trim($number2),
	'message' => $message2
));
// sending  
$data=json_encode($senddata);
$curlHandle = curl_init($urlendpoint);
curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
);
curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 30);
$respon = curl_exec($curlHandle);
curl_close($curlHandle);
header('Content-Type: application/json');
echo $respon;
?>
