<?php

const CONSUMER_KEY = '80613-c75e5b2f359c163253b130ff';

spl_autoload_register(function ($class) {
    include strtolower($class) . '.php';
});
