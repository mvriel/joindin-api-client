<?php

namespace Joindin\Api;

use GuzzleHttp\Collection;
use GuzzleHttp\Client as GuzzleClient;

class Client extends GuzzleClient
{
    const DEFAULT_BASE_URL = 'http://api.joind.in/v2.1';

    public function __construct($config = array())
    {
        $defaults = array('base_url' => self::DEFAULT_BASE_URL);
        $required = array('base_url');

        $configuration = Collection::fromConfig($config, $defaults, $required);

        parent::__construct($configuration->toArray());

        if ($configuration->get('access_token')) {
            $this->setDefaultOption('headers/Authorization', 'OAuth ' . $configuration->get('access_token'));
        }
        $this->setDefaultOption('headers/Accept-Charset', 'utf-8');
        $this->setDefaultOption('headers/Accept', 'application/json');
        $this->setDefaultOption('headers/Content-Type', 'application/json');
    }
}