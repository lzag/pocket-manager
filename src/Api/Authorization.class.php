<?php

namespace App\Api;

class Authorization
{
    private $consumer_key;
    private $redirect_url;

    public function __construct()
    {
        $this->consumer_key = $_ENV('CONSUMER_KEY');
        $this->redirect_url = $_ENV('APP_URL');
    }

    public function getRequestCode()
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
            'consumer_key=' . $this->consumer_key . '&redirect_uri=' . $this->redirect_url
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
                    'X-Accept: application/x-www-form-urlencoded'));

        $output = curl_exec($curl);

        curl_close($curl);

        $request_code = (substr($output, 5));

        return $request_code;
    }

    public function getRedirectUrl()
    {
        return 'https://getpocket.com/auth/authorize?request_token=' . $this->request_code
                . '&redirect_uri=' . $this->redirect_url . 'confirmapi.php?code=' . $this->request_code;
    }
}
