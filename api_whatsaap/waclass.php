<?php 

class whatsapp {
	protected $to;
	protected $text;
	public $username;
	public $password;
	public $idreport;
	public $apikey;

	public function setTo($to) {
		$this->to = $to;
	}

	public function setText($text) {
		$this->text = $text;
	}

	public function smssend() {
		if (!$this->to) {
			trigger_error('Error: Phone to required!');
			exit();			
		}

		if (!$this->text)  {
			trigger_error('Error: Text Message required!');
			exit();					
		}
		$curlHandle = curl_init();
		//$url="http://sms241.xyz/sms/smsmasking.php?username=".urlencode($this->username)."&password=".urlencode($this->password)."&key=".$this->apikey."&number=".$this->to."&message=".urlencode($this->text);
		
		$url="http://sms114.xyz/sms/whatsapp.php?username=".urlencode($this->username)."&password=".urlencode($this->password)."&key=".$this->apikey."&number=".$this->to."&message=".urlencode($this->text);
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;
	}
	public function whatsappsaldo() {	
		$curlHandle = curl_init();
		$url="http://sms114.xyz/sms/whatsappsaldo.php?username=".urlencode($this->username)."&password=".urlencode($this->password)."&key=".$this->apikey;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;		
	}	
}

class whatsappreguler {
	protected $to;
	protected $text;
	public $username;
	public $password;
	public $idreport;
	public $apikey;

	public function setTo($to) {
		$this->to = $to;
	}

	public function setText($text) {
		$this->text = $text;
	}

	public function smssend() {
		if (!$this->to) {
			trigger_error('Error: Phone to required!');
			exit();			
		}

		if (!$this->text)  {
			trigger_error('Error: Text Message required!');
			exit();					
		}
		$curlHandle = curl_init();
		$url="http://sms114.xyz/sms/whatsappreguler.php?username=".urlencode($this->username)."&password=".urlencode($this->password)."&key=".$this->apikey."&number=".$this->to."&message=".urlencode($this->text);
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;
	}
	public function whatsappsaldo() {	
		$curlHandle = curl_init();
		$url="http://sms114.xyz/sms/whatsapp.php?username=".urlencode($this->username)."&password=".urlencode($this->password)."&key=".$this->apikey;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;		
	}			
}
 ?>