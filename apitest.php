<?php

require 'functions.php';

function cURL() {
	
	$curl = curl_init();
	
	if (!$curl)
	{
		die("Couldn't initialize a CURL handle");
	}

	curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/oauth/request');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'consumer_key='.CONSUMER_KEY.'&redirect_uri=http://localhost/');
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
				'X-Accept: application/x-www-form-urlencoded'));

	$output = curl_exec($curl);

	curl_close($curl);

	$request_code = (substr($output,5));

	global $con;

	$stmt = $con->prepare('UPDATE api_keys SET request_code = ? WHERE consumer_key = ?' );
	$stmt->execute(array($request_code,CONSUMER_KEY));

	header('Location: https://getpocket.com/auth/authorize?request_token='.$request_code.'&redirect_uri=http://localhost/pocket-manager/confirmapi.php?code='.$request_code);

}

cURL();

?>
