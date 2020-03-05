<?php

spl_autoload_register(function ($class) {
    $class_name = preg_replace('/App\\\/', '/src/', $class);
    include __DIR__ . $class_name . '.class.php';
});
