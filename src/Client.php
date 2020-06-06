<?php
namespace Proapis;
use GuzzleHttp\Client as GuzzleClient;
use Proapis\Exceptions\ApikeyException;
use Proapis\Exceptions\CreditsException;
use Proapis\Exceptions\InvalidkeyException;
use Proapis\Exceptions\InvalidendpointException;
use Proapis\Exceptions\ValidationException;
use Proapis\Exceptions\ServerException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException as GuzzleServerException;

class Client
{

    /**
     * @var $baseuri Base URL
     */
    private $baseuri = 'https://proapis.cloud/api';

    /**
     * @var $apiversion API version
     */
    private $apiversion = '1';

    /**
     * @var $apikey API key. Get from https://proapis.cloud
     */
    private $apikey = null;

    public function __construct($apikey = null)
    {
        $this->apikey = $apikey;
    }

    /**
     * Set apikey
     * 
     * @param string $apikey
     * @return null
     */
    public function setkey(string $apikey)
    {
        $this->apikey = $apikey;
    }

    /**
     * Perform an HTTP request
     * 
     * @return array API call results
     */
    public function request($method, $uri = '', array $options = [])
    {
        if(!$this->apikey)
        {
            throw new ApikeyException();
        }
        $options['headers']['Authorization'] = sprintf('Bearer %s', $this->apikey);

        try
        {
            $uri = sprintf('%s/v%s/%s', $this->baseuri, $this->apiversion, $uri);
            $client = new GuzzleClient();
            return json_decode($client->request($method, $uri, $options)->getBody()->getContents());
        } catch(ClientException $e)
        {
            $response = $e->getResponse();
            if($response)
            {
                switch((int) $response->getStatusCode())
                {
                    case 403:
                        throw new InvalidkeyException();
                        break;
                    case 402:
                        throw new CreditsException();
                        break;
                    case 422:
                        $errors = json_decode($response->getBody()->getContents(), true);
                        $message = '';
                        foreach($errors as $errkey => $errvalue)
                        {
                            $message .= $errkey . ": " . $errvalue[0] . PHP_EOL;
                        }
                        throw new ValidationException($message);
                        break;
                    case 404:
                        throw new InvalidendpointException();
                        break;
                }
            }
        } catch(GuzzleServerException $e)
        {
            throw new ServerException();
        }
    }
}