<?php

require 'init.php';

$user = new User;

$list = $user->getRecent();

?>

    <?php foreach ($list as $item) : ?>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top rounded" src="<?=$item->has_image ? $item->images->{'1'}->src : 'https://lorempixel.com/420/240/abstract/1/Sample'?>" alt="Card image cap">
        <div class="card-body text-left">
            <h5 class="card-title">
                <?=$item->given_title?>
            </h5>
            <h7 class="card-subtitle text-muted pb-5"><small>Tags:
    
    <?php if (property_exists($item, 'tags')) : ?>
    <?php foreach ($item->tags as $tag) : ?>
    
    <?=$tag->tag?>
    
    <?php endforeach ?>
    <?php endif ?>
    
    </small></h7>
            <p class="card-text">
                <?=$item->excerpt?>
            </p>
            <a href="<?=$item->given_url?>" class="btn btn-primary">Go to article</a>
            <a href="#" class="btn btn-danger" id="deleteItem" onClick="deleteItem(event)">Delete</a>
            <input type="hidden" value="<?=$item->item_id?>">
        </div>
    </div>

    <?php endforeach; ?>
