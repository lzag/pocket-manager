<?php

session_start();

require 'functions.php';

function registerCode()
{

    $request_code = $_SESSION['request_code'] ?? '';

    $curl = curl_init();

    if (!$curl) {
        die("Couldn't initialize a CURL handle");
    }

    curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/oauth/authorize');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, 'consumer_key='.CONSUMER_KEY.'&code='.$request_code);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                                                'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
                                                'X-Accept: application/x-www-form-urlencoded'));

    $output = curl_exec($curl);
    curl_close($curl);

    parse_str($output, $user_data);

    $username = $user_data['username'];
    $access_token = $user_data['access_token'];

    global $con;

    $stmt = $con->prepare('SELECT * FROM api_keys WHERE username = ?');
    $stmt->execute(array($username));

    if ($stmt->rowCount()) {

        $stmt = $con->prepare('DELETE FROM api_keys WHERE username = ?');
        $stmt->execute(array($username));

    }

    $stmt = $con->prepare('INSERT INTO api_keys(username, access_code) VALUES(?, ?)');
    if ($stmt->execute(array($username,$access_token))) {
        echo "You have successfully authorized the Pocket Manager App";
    } else {
        echo "You have already authorized our app";
    }

}

registerCode();

// EOF
