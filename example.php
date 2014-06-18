<?php
include 'vendor/autoload.php';

$client = new \Joindin\Api\Client(
    array(
        'base_url'     => 'http://api.dev.joind.in:8080',
//        'access_token' => '<MyAccessToken>',
//        'defaults'     => array('proxy' => 'tcp://localhost:8888')
    )
);

$eventService = $client->getService(new \Joindin\Api\Description\Events());

/** @var \Joindin\Api\Response $result Find a complete event listing (max 20) */
$result = $eventService->list();

/** @var \Joindin\Api\Entity\Event $event Get event entity*/
$event = current($result->getResource());

/** @var \Joindin\Api\Response $result Find a specific event at the given url */
$event = $eventService->fetch(array('url' => $event->getUri()));

/** @var string[] $result Submit a new event and receive an array with the url of the new event */
$result = $eventService->submit(
    array(
        'name'         => 'My Event',
        'description'  => 'My Event Description',
        'start_date'   => '2014-06-01',
        'end_date'     => '2014-07-31',
        'tz_continent' => 'Europe',
        'tz_place'     => 'Amsterdam',
    )
);

/** @var \Joindin\Api\Response $result Retrieve the new event by the returned URL */
$result = $eventService->fetch(array('url' => $result['url']));

var_export($result);
