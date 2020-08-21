<?php

namespace TpaApi\Webservices\Services;

use TpaApi\Webservices\Models\PortDTO;
use TpaApi\Webservices\Traits\Collection;
use TpaApi\Webservices\Traits\ExceptionHandler;
use TpaApi\Webservices\WebService;

class PortService extends WebService
{
    // Constructor
    public function __construct()
    {
        parent::__construct('Port');
    }

    /**
     * @return Collection
     */
    public function all()
    {
        $response = $this->call('All');

        ExceptionHandler::checkResult(
            $response,
            'AllResult',
            'PortDTO'
        );

        $collection = new Collection($response['AllResult']['PortDTO']);
        return $collection->map(function ($item) {
            return new PortDTO($item);
        });
    }

    /**
     * @param string $portCode
     * @return PortDTO
     */
    public function get($portCode)
    {
        $requestBody = array(
            array( 'portCode' => $portCode, ),
        );

        $response = $this->call('Get', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetResult',
            null
        );

        return new PortDTO($response['GetResult']);
    }

    /**
     * @param int $productId
     * @return PortDTO
     */
    public function getForProduct($productId)
    {
        $requestBody = array(
            array( 'productId' => $productId, ),
        );

        $response = $this->call('GetForProduct', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetForProductResult',
            null
        );

        return new PortDTO($response['GetForProductResult']);
    }

    /**
     * @param string $portCodes
     * @return Collection
     */
    public function getSelected($portCodes)
    {
        $requestBody = array(
            array( 'portCodes' => $portCodes, ),
        );

        $response = $this->call('GetSelected', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetSelectedResult',
            'PortDTO'
        );

        $collection = new Collection($response['GetSelectedResult']['PortDTO']);
        return $collection->map(function ($item) {
            return new PortDTO($item);
        });
    }
}