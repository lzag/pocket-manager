<?php

session_start();

require 'functions.php';

function cURL() {
	
    $curl = curl_init();
	
    if (!$curl) {
        die("Couldn't initialize a CURL handle");
	}

	curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/oauth/request');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'consumer_key='.CONSUMER_KEY.'&redirect_uri=http://localhost/pocket-manager/');
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
				'X-Accept: application/x-www-form-urlencoded'));

	$output = curl_exec($curl);

    curl_close($curl);

    $request_code = (substr($output, 5));

    $_SESSION['request_code'] = $request_code;

    header('Location: https://getpocket.com/auth/authorize?request_token='.$request_code.'&redirect_uri=http://localhost/pocket-manager/confirmapi.php?code='.$request_code);

}

cURL();
