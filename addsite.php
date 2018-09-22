<?php

require 'functions.php';

function addSite()
{

    $url = $_GET['url'];
    $title = $_GET['title'];

    $array = ['url' => $url,
                'title' => $title,
                'consumer_key' => CONSUMER_KEY,
                'access_token' => '955c00a9-9c76-bd40-69fc-6f6806',
             ];

    $array_json = json_encode($array);

    $curl = curl_init();

    if (!$curl)
    {
        die("Couldn't initialize a CURL handle");
    }

    curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/add');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $array_json);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=UTF-8',
                'X-Accept: application/json'
                ));

    $output = curl_exec($curl);

    curl_close($curl);

    return json_decode($output)->status === 1 ? true : false;
}

echo (addSite()) ?  "Site added" : "Problems with adding site, try again";
