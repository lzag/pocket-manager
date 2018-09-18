<?php

require 'functions.php';

function cURL() {
	
	$curl = curl_init();
	
	if (!$curl) {
		die("Couldn't initialize a CURL handle");
	}

curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/oauth/request');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, 'consumer_key=80613-1e78f4859bf18a4fd2acd8b0&redirect_uri=http://localhost/');
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
			'X-Accept: application/x-www-form-urlencoded'));

$output = curl_exec($curl);
	
curl_close($curl);
$consumer_key = '80613-1e78f4859bf18a4fd2acd8b0';
$request_code = (substr($output,5));

global $con;
	
$stmt = $con->prepare('UPDATE api_keys SET request_code = ? WHERE api_name = ?' );
$stmt->execute(array($request_code,$consumer_key));
	
header('Location: https://getpocket.com/auth/authorize?request_token='.$request_code.'&redirect_uri=http://localhost/social-network/confirmapi.php?code='.$request_code.'&amp;sth=432142142');
	
}


cURL();




?>