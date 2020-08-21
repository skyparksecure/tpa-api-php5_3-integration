<?php

namespace TpaApi\Webservices\Services;

use TpaApi\Webservices\Models\TransferServiceDTO;
use TpaApi\Webservices\Models\TransferServiceProviderDTO;
use TpaApi\Webservices\Models\TransfersLocationSearchLocationDTO;
use TpaApi\Webservices\Traits\Collection;
use TpaApi\Webservices\Traits\ExceptionHandler;
use TpaApi\Webservices\WebService;

class TransfersService extends WebService
{
    // Constructor
    public function __construct()
    {
        parent::__construct('Transfers');
    }

    /**
     * @param string $country
     * @param string $type
     * @return TransfersLocationSearchLocationDTO
     */
    public function allLocationsWith($country, $type)
    {
        $requestBody = array(
            array(
                'countryCode' => $country,
                'type' => $type,
            ),
        );

        $response = $this->call('AllLocationsWith', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'AllLocationsWithResult',
            null
        );

        return new TransfersLocationSearchLocationDTO($response['AllLocationsWithResult']);
    }

    /**
     * @param int $serviceId
     * @return TransferServiceDTO
     */
    public function getService($serviceId)
    {
        $requestBody = array(
            array( 'serviceId' => $serviceId, ),
        );

        $response = $this->call('GetService', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetServiceResult',
            null
        );

        return new TransferServiceDTO($response['GetServiceResult']);
    }

    /**
     * @param int $serviceProviderId
     * @return TransferServiceProviderDTO
     */
    public function getServiceProvider($serviceProviderId)
    {
        $requestBody = array(
            array( 'serviceProviderId' => $serviceProviderId, ),
        );

        $response = $this->call('GetServiceProvider', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetServiceProviderResult',
            null
        );

        return new TransferServiceProviderDTO($response['GetServiceProviderResult']);
    }

    /**
     * @return object
     */
    public function getServiceProviders()
    {
        $response = $this->call('GetServiceProviders');

        ExceptionHandler::checkResult(
            $response,
            'GetServiceProvidersResult',
            'TransferServiceProviderDTO'
        );

        $collection = new Collection($response['GetServiceProvidersResult']['TransferServiceProviderDTO']);
        return $collection->map(function ($item) {
            return new TransferServiceProviderDTO($item);
        });
    }
}