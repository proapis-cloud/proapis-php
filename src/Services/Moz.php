<?php
namespace Proapis\Services;
use Proapis\Client as ProapisClient;

class Moz extends ProapisClient
{
    /**
     * @var $endpoint
     */
    private $endpoint = 'moz/stats/';

    /**
     * 
     * @var array $params Query params
     * @return array JSON response
     * @throws Exceptions
     */
    public function getData(array $data)
    {
        $options['json'] = $data;
        return $this->request('post', $this->endpoint, $options);
    }
}