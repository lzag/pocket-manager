<?php

require 'functions.php';

function getRecent() {
	
	$array = ['consumer_key' => CONSUMER_KEY,
			 'access_token' => '955c00a9-9c76-bd40-69fc-6f6806',
			 'count' => 12,
			 'detailType' => 'complete'];
	
	$array_json = json_encode($array);
	
	$curl = curl_init();
	
	if (!$curl)
	{
		die("Couldn't initialize a CURL handle");
	}

	curl_setopt($curl, CURLOPT_URL, 'https://getpocket.com/v3/get');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $array_json);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				));

	$output = curl_exec($curl);

	curl_close($curl);

	return $list = json_decode($output)->list;
}

$list = getRecent();

?>

<?php foreach ($list as $item) : ?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top rounded" src="<?=$item->has_image ? $item->images->{'1'}->src : 'https://lorempixel.com/420/240/abstract/1/Sample'?>" alt="Card image cap">
  <div class="card-body text-left">
    <h5 class="card-title"><?=$item->given_title?></h5>
    <h7 class="card-subtitle text-muted pb-5"><small>Tags:
    <?php if(property_exists($item,'tags')) foreach ($item->tags as $tag) : ?>
    <?=$tag->tag?>
    <?php endforeach ?>
    </small></h7>
    <p class="card-text"><?=$item->excerpt?></p>
	<a href="<?=$item->given_url?>" class="btn btn-primary">Go to article</a>
	<a href="#" class="btn btn-danger" id="deleteItem" onClick="deleteItem(event)">Delete</a>
	<input type="hidden" value="<?=$item->item_id?>">
 </div>
</div>

<?php endforeach; ?>

