<?php
/**
*
*/
//http://vn.ehandicap.net/cgi-bin/hcapstat.exe?NAME=THEIN&MID=147896325&CID=vietcap
	class eHandicap
	{
		private $registerLink = 'http://vn.ehandicap.net/cgi-bin/admin_mem.exe?vietcapnew=1&CID=vietcap&MID=%s&firstname=%s&lastname=%s&gender=%s&email=%s&pass=%s';
		function __construct()
		{
			# code...
		}
		public function RegisterNewMember($member)
		{
			$url=self::getRegisterLink($member);
			//echo $url;
			return self::testSubmit($url);
		}
		public function RenewMember()
		{

		}
		public function VerifyMember()
		{

		}
		private function getRegisterLink($member)
		{
			return sprintf($this->registerLink,$member->MID,$member->firstname,$member->lastname,$member->gender,$member->email,$member->pass);
		}
		private function testSubmit($url) {
			echo $url;
			$ch = curl_init();
			// set URL and other appropriate options
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// returns the result - very important
			// grab URL and pass it to the browser
			$response = curl_exec($ch);
			//$response = curl_multi_getcontent($ch);
			// close cURL resource, and free up system resources
			curl_close($ch);
			//var_dump($response);
			return $response;
		}
	}
	  class eHandicapMember {
		public 	$vietcapnew='';
		public	$CID='';
		public	$MID='';
		public	$firstname='';
		public	$lastname='';
		public	$gender='';
		public	$email='';
		public	$pass='';
		public  $CURRCID='';
		public  $CURRMID='';
	}
?>