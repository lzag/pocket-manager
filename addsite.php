<?php

require 'init.php';

$user = new User;

echo ($user->addSite()) ?  "Site added" : "Problems with adding site, try again";
