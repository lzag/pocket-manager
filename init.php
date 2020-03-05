<?php

const CONSUMER_KEY = '80613-c75e5b2f359c163253b130ff';

spl_autoload_register(function ($class) {
    $class_name = preg_replace('/App\\\/', '/src/', $class);
    include __DIR__ . $class_name . '.class.php';
});
