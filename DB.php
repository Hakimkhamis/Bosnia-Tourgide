<?php

class DB {
    /** @var \MongoDB\Client MongoDB client. */
    private $client;

    public function __construct() {
        $uri = "mongodb://" . DB_USER . ":" . DB_PASS . "@" . DB_HOST . "/" . DB_NAME . "?retryWrites=true";
        $this->client = new \MongoDB\Client($uri);
    }

    public function get_all_cities() {
        $collection = $this->client->selectCollection(DB_NAME, 'cities');
        $list = $collection->find()->toArray();
        /* Return the data list */
        return $list;  
    }

    public function get_city_by_name($name) {
        $collection = $this->client->selectCollection(DB_NAME, 'cities');
        $list = $collection->find([ 'name' => strtoupper($name) ])->toArray();
        /* Check for record existance */
        if (count($list) > 0) {
            return $list[0];
        }
        return NULL;
    }
}