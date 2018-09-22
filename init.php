<?php

require 'functions.php';

spl_autoload_register(function ($class) {
    include $class . '.php';
});
