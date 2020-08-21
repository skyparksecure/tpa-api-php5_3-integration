<?php

namespace TpaApi\Webservices\Services;

use TpaApi\Webservices\Models\CountryDTO;
use TpaApi\Webservices\Models\LocationDTO;
use TpaApi\Webservices\Traits\Collection;
use TpaApi\Webservices\Traits\ExceptionHandler;
use TpaApi\Webservices\WebService;

class LocationService extends WebService
{
    /**
     * LocationService constructor.
     */
    public function __construct()
    {
        parent::__construct('Location');
    }

    /**
     * @param string $locationCode
     * @return LocationDTO
     */
    public function get($locationCode)
    {
        $requestBody = array(
            array( 'locationCode' => $locationCode, ),
        );

        $response = $this->call('Get', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetResult',
            null
        );

        return new LocationDTO($response['GetResult']);
    }

    /**
     * @param string $locationCode
     * @return array
     */
    public function getLocalisations($locationCode)
    {
        $requestBody = array(
            array( 'locationCode' => $locationCode, ),
        );

        $response = $this->call('GetLocalisations', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetLocalisationsResult'
        );

        return $response['GetLocalisationsResult'];
    }

    /**
     * @param string $locationType
     * @return Collection
     */
    public function countriesWithLocationType($locationType)
    {
        $requestBody = array(
            array( 'locationType' => $locationType, ),
        );

        $response = $this->call('CountriesWithLocationType', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'CountriesWithLocationTypeResult',
            'CountryDTO'
        );

        $collection = new Collection($response['CountriesWithLocationTypeResult']['CountryDTO']);
        return $collection->map(function ($item) {
            return new CountryDTO($item);
        });
    }
}