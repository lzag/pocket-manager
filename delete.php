<?php

require 'functions.php';

function deleteItem() {
    
	ECHO '<PRE>';

	$id = $_GET['id'];

	$array = [['action' => 'delete',
				'item_id' => $id],
						   ];

	$array_json = urlencode(json_encode($array));

	$curl = curl_init();

	if (!$curl)
	{
		die("Couldn't initialize a CURL handle");
	}

	curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/send?actions=' . $array_json . '&access_token=955c00a9-9c76-bd40-69fc-6f6806' . '&consumer_key=' . CONSUMER_KEY);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($curl);

	curl_close($curl);

	return json_decode($output)->status === 1 ? TRUE : FALSE;
}

deleteItem();

?>
