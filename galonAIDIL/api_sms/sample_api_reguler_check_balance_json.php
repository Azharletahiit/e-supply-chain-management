<?php
require_once('api_sms_class_reguler_json.php'); // class  
ob_start();
// setting 
$apikey      = '6a93427857c48ecb15b791e0e3ca43fd'; // api key 
$ipserver    = 'http://45.32.118.255/'; // url server sms 

// create header json  
$senddata = array(
	'apikey' => $apikey
);
$sms = new sms_class_reguler_json();
$sms->setIp($ipserver); 
$sms->setData($senddata);
$resnponjson = $sms->balance();
header('Content-Type: application/json');
echo $resnponjson;
?>
