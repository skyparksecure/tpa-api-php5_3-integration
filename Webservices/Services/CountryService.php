<?php

namespace TpaApi\Webservices\Services;

use TpaApi\Webservices\Models\CountryDTO;
use TpaApi\Webservices\Traits\Collection;
use TpaApi\Webservices\Traits\ExceptionHandler;
use TpaApi\Webservices\WebService;

class CountryService extends WebService
{
    // Constructor
    public function __construct()
    {
        parent::__construct('Country');
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
            'CountryDTO'
        );

        $collection = new Collection($response['AllResult']['CountryDTO']);
        return $collection->map(function ($item) {
            return new CountryDTO($item);
        });
    }

    /**
     * @param string $countryCode
     * @return CountryDTO
     */
    public function get($countryCode)
    {
        $requestBody = array(
            array( 'countryCode' => $countryCode, ),
        );

        $response = $this->call('Get', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetResult',
            null
        );

        return new CountryDTO($response['GetResult']);
    }

    /**
     * @param CountryDTO $countryDTO
     * @return Collection
     */
    public function find(CountryDTO $countryDTO)
    {
        $requestBody = array(
            array( 'country' => $countryDTO->toArray(), ),
        );

        $response = $this->call('Find', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'FindResult',
            'CountryDTO'
        );

        $collection = new Collection($response['FindResult']['CountryDTO']);
        return $collection->map(function ($item) {
            return new CountryDTO($item);
        });
    }
}