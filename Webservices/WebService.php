<?php

namespace TpaApi\Webservices;

use SoapClient;
use SoapHeader;

/**
 * Class WebService
 * @package App\Webservices
 */
class WebService
{
    public $serverUrl;
    public $client;
    public $headers;

    /**
     * WebService constructor.
     *
     * @param string $serviceName
     */
    public function __construct($serviceName)
    {
        $this->initializeClient($serviceName);
    }

    /**
     * Initializes the SOAP client and headers based on the given service type and config settings
     *
     * @param string $serviceName
     */
    public function initializeClient($serviceName)
    {
        // Set up web server depending on set environment
        $this->serverUrl = TPA_URL;

        // Set up default headers with API key
        $this->headers[] = new SoapHeader(
            TPA_NAMESPACE,
            'ApiKey',
            TPA_KEY
        );
        $this->headers[] = new SoapHeader(
            TPA_NAMESPACE,
            'Culture',
            'en-GB'
        );

        // Set up SOAP client
        $serviceUrl = $this->serverUrl . ServiceUrl::get($serviceName);
        $this->client = new SoapClient($serviceUrl, array(
                'trace' => 1,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'exceptions' => true,
                'debug' => true,
//                'soap_version' => SOAP_1_2,
            ));
    }

    /**
     * Performs the internal SOAP call using the initialized client, headers and given action name and request body
     *
     * @param string $actionName
     * @param array $requestBody
     * @return array
     */
    public function call($actionName, array $requestBody = array())
    {
        $response = $this->client->__soapCall(
            $actionName,
            $requestBody,
            null,
            $this->headers
        );

        echo 'Request:' . PHP_EOL;
        var_dump($this->client->__getLastRequest());
        var_dump($this->client->__getLastRequestHeaders());

        return json_decode(json_encode($response), true);
    }

    /**
     * @param string $actionName
     * @param array $requestParams
     * @return array
     */
    public function rawCall($actionName, array $requestParams)
    {
        $requestBody = array(
            $requestParams
        );

        return $this->call($actionName, $requestBody);
    }
}
