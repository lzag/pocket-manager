<?php

namespace App;

class User
{
    private $consumer_key;
    private $username = '';
    private $access_token = '';
    private $conn;

    public function __construct()
    {
        session_start();
        $this->username = $_SESSION['username'];
        $this->access_token = $_SESSION['access_token'];
        $this->consumer_key = $_ENV['CONSUMER_KEY'];
    }
    
    public static function requestAuth()
    {

        $curl = curl_init();

        if (!$curl) {
            die("Couldn't initialize a CURL handle");
        }

        curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/oauth/request');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt(
            $curl,
            CURLOPT_POSTFIELDS,
            'consumer_key='.$this->consumer_key .'&redirect_uri=http://localhost/pocket-manager/'
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
                    'X-Accept: application/x-www-form-urlencoded'));

        $output = curl_exec($curl);

        curl_close($curl);

        $request_code = (substr($output, 5));

        session_start();
        $_SESSION['request_code'] = $request_code;

        header('Location: https://getpocket.com/auth/authorize?request_token='.$request_code.'&redirect_uri=' . confirmapi.php?code='.$request_code);

    }

    public static function registerCode()
    {

        session_start();
        $request_code = $_SESSION['request_code'] ?? '';

        $curl = curl_init();

        if (!$curl) {
            die("Couldn't initialize a CURL handle");
        }

        curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/oauth/authorize');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'consumer_key='. $this->consumer .'&code='.$request_code);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                                                    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
                                                    'X-Accept: application/x-www-form-urlencoded'));

        $output = curl_exec($curl);

        curl_close($curl);

        parse_str($output, $user_data);

        $_SESSION['username'] = $user_data['username'];
        $_SESSION['access_token'] = $user_data['access_token'];

        return true;

    }
    
    public static function checkCredentials()
    {
        session_start();
        if (isset($_SESSION['username']) && isset($_SESSION['access_token'])) {
            return true;
        } else {
            return false;
        }
    }
    
    
}