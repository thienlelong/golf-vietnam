<?php
/**
*
*/
	class eHandicap
	{
		private $registerLink='http://vn.ehandicap.net/cgi-bin/admin_mem.exe?vietcapnew=1&CID=vietcap&MID=%s&firstname=%s&lastname=%s&gender=%s&email=%s&pass=%s';
		function __construct()
		{
			# code...
		}
		public function RegisterNewMember($member)
		{
			$url=self::getRegisterLink($member);
			self::testSubmit($url);
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
		private function testSubmit($url)
		{
			$ch = curl_init();
			// set URL and other appropriate options
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			// grab URL and pass it to the browser
			curl_exec($ch);
			// close cURL resource, and free up system resources
			curl_close($ch);
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