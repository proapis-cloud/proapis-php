<?php
namespace Proapis\Services;
use Proapis\Client as ProapisClient;

class Keywords extends ProapisClient
{
    /**
     * @var $endpoint
     */
    private $endpoint = 'google/kp/data/';

    /**
     * 
     * @var array $params Query params
     * @return array JSON response
     * @throws Exceptions
     */
    public function getData(array $params)
    {
        $options['query'] = $params;
        return $this->request('get', $this->endpoint, $options);
    }
}