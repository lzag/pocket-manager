<?php

require 'functions.php';

function registerCode () {
	global $con;
	$request_code = $_GET['code'];
	$stmt = $con->prepare('SELECT request_code FROM api_keys WHERE request_code = ?');
	$stmt->execute(array($request_code));
	$code = $stmt->fetch(PDO::FETCH_NUM)[0];
	
	print_r($code);

	$curl = curl_init();
	
	if (!$curl) {
		die("Couldn't initialize a CURL handle");
	}

	curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/oauth/authorize');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'consumer_key='.CONSUMER_KEY.'&code='.$code);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
				'X-Accept: application/x-www-form-urlencoded'));

	$output = curl_exec($curl);
	curl_close($curl);
	print_r($output);

}
	
registerCode();

?>
