<?php
require_once('api_sms_class_reguler_json.php'); // class  
ob_start();
// setting 
$apikey      = '6a93427857c48ecb15b791e0e3ca43fd'; // api key 
$ipserver    = 'http://45.32.118.255/'; // url server sms 
$callbackurl = 'sample_api_reguler_get_status_sms_json.php'; // url callback get status sms 

// create header json  
$senddata = array(
	'apikey' => $apikey,  
	'callbackurl' => $callbackurl, 
	'datapacket'=>array()
);

// create detail data json 
// data 1

$number1='08114700155';
$message1='Tes SMS Gateway';
$sendingdatetime1 ="2017-01-01 23:59:59"; 
array_push($senddata['datapacket'],array(
	'number' => trim($number1),
	'message' => urlencode(stripslashes(utf8_encode($message1))),
	'sendingdatetime' => $sendingdatetime1));
	
// data 2
// $number2='081xxx';
// $message2='Message 2';
// $sendingdatetime2 ="2017-01-01 23:59:59";
// array_push($senddata['datapacket'],array(
// 	'number' => trim($number2),
// 	'message' => urlencode(stripslashes(utf8_encode($message2))),
// 	'sendingdatetime' => $sendingdatetime2));
	
// class sms 
$sms = new sms_class_reguler_json();
$sms->setIp($ipserver);
$sms->setData($senddata);
$responjson = $sms->send();
header('Content-Type: application/json');
echo $responjson;
?>
