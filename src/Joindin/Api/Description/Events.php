<?php

namespace Joindin\Api\Description;

use GuzzleHttp\Command\Guzzle\Description;

final class Events extends Description
{
    /**
     * Service definition for the events endpoint.
     *
     * @var string[]
     */
    private $definition = array(
        'operations' => array(
            'fetch' => array(
                'httpMethod'    => 'GET',
                'uri'           => 'v2.1/events/{id}',
                'responseModel' => 'object',
                'parameters'    => array(
                    'id'      => array('type' => 'string', 'location' => 'uri', 'required' => true),
                    'verbose' => array('type' => 'string', 'location' => 'query', 'default' => 'no'),
                    'accept'  => array(
                        'type'     => 'string',
                        'location' => 'header',
                        'required' => true,
                        'default'  => 'application/json'
                    )
                )
            )
        ),
        'models' => array(
            'object' => array('type' => 'object', 'additionalProperties' => array('location' => 'json'))
        )
    );

    /**
     * {@inheritDoc}
     */
    public function __construct(array $config = array(), array $options = array())
    {
        parent::__construct(array_merge($this->definition, $config), $options);
    }
}