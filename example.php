<?php
include 'vendor/autoload.php';

$client = new \Joindin\Api\Client(
    array(
        'base_url'     => 'http://api.dev.joind.in:8080',
//        'access_token' => '<MyAccessToken>',
//        'defaults'     => array('proxy' => 'tcp://localhost:8888')
    )
);

$client = new \GuzzleHttp\Command\Guzzle\GuzzleClient($client, new \Joindin\Api\Description\Events());

var_export($client->fetch(array('id' => '1')));