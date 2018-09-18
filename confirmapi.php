<?php

require 'functions.php';

function registerCode () {
	global $con;
	
	$stmt = $con->prepare('SELECT request_code FROM api_keys WHERE api_name = ?');
	$stmt->execute(array('80613-1e78f4859bf18a4fd2acd8b0'));
	$code = $stmt->fetch(PDO::FETCH_NUM)[0];
	
	$curl = curl_init();
	
	if (!$curl) {
		die("Couldn't initialize a CURL handle");
	}

	curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/oauth/authorize');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'consumer_key=80613-1e78f4859bf18a4fd2acd8b0&code='.$code);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
				'X-Accept: application/x-www-form-urlencoded'));

	$output = curl_exec($curl);
	curl_close($curl);
	print_r($output);

}
	
registerCode();

?>