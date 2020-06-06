<?php
namespace Proapis\Services;
use Proapis\Client as ProapisClient;

class GooglePlay extends ProapisClient
{
    /**
     * @var $endpoint
     */
    private $endpoint = 'google/play/details/';

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