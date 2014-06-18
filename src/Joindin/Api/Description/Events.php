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
            'list' => array(
                'httpMethod'    => 'GET',
                'uri'           => 'v2.1/events',
                'responseModel' => 'object',
                'parameters'    => array(
                    'verbose' => array('type' => 'string', 'location' => 'query', 'default' => 'yes'),
                    'filter'  => array(
                        'type'     => 'string',
                        'location' => 'query',
                        'required' => false,
                        'enum'     => array('hot', 'upcoming', 'past', 'cfps')
                    ),
                    'title'   => array('type' => 'string', 'location' => 'query', 'required' => false),
                    'stub'    => array('type' => 'string', 'location' => 'query', 'required' => false),
                )
            ),
            'fetch' => array(
                'httpMethod'    => 'GET',
                'uri'           => 'v2.1/events/{id}',
                'responseModel' => 'object',
                'parameters'    => array(
                    'id'      => array('type' => 'string', 'location' => 'uri', 'required' => true),
                    'verbose' => array('type' => 'string', 'location' => 'query', 'default' => 'yes'),
                )
            ),
        ),
        'models' => array(
            'object' => array(
                'type' => 'object',
                'additionalProperties' => array('location' => 'json', 'mapper' => 'Joindin\Api\Mapper\Event[]')
            )
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