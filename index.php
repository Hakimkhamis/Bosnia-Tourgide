<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';
require_once __DIR__.'/DB.php';

Flight::route('GET /', function() {
    Flight::json(["hello" => "world"]);
});

Flight::route('GET /cities', function() {
    $db = new DB();
    Flight::json($db->get_all_cities());
});

Flight::route('GET /cities/@name', function($name) {
    $db = new DB();
    Flight::json($db->get_city_by_name($name));
});

Flight::start();