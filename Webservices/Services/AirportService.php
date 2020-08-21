<?php

namespace TpaApi\Webservices\Services;

use TpaApi\Webservices\Models\AirportDTO;
use TpaApi\Webservices\Traits\Collection;
use TpaApi\Webservices\Traits\ExceptionHandler;
use TpaApi\Webservices\WebService;

/**
 * Class AirportService
 * @package App\Webservices\Services
 */
class AirportService extends WebService
{
    // Constructor
    public function __construct()
    {
        parent::__construct('Airport');
    }

    /**
     * Returns all available airports
     * @return Collection([AirportDTO])
     */
    public function all()
    {
        $response = $this->call('All');

        ExceptionHandler::checkResult(
            $response,
            'AllResult',
            'AirportDTO'
        );

        $collection = new Collection($response['AllResult']['AirportDTO']);
        return $collection->map(function ($value) {
            return new AirportDTO($value);
        });
    }

    /**
     * @param string $countryCode
     * @return Collection
     */
    public function allByCountry($countryCode = 'GB')
    {
        $requestBody = array(
            array( 'countryCode' => $countryCode, ),
        );

        $response = $this->call('AllByCountry', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'AllByCountryResult',
            'AirportDTO'
        );

        $collection = new Collection($response['AllByCountryResult']['AirportDTO']);
        return $collection->map(function ($item) {
            return new AirportDTO($item);
        });
    }

    /**
     * @param string $airportCode
     * @return AirportDTO
     */
    public function get($airportCode)
    {
        $requestBody = array(
            array( 'airportCode' => $airportCode, ),
        );

        $response = $this->call('Get', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetResult',
            null
        );

        return new AirportDTO($response['GetResult']);
    }

    /**
     * @param int $productId
     * @return AirportDTO
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

        return new AirportDTO($response['GetForProductResult']);
    }

    /**
     * @param string $airportCodes
     * @return Collection
     */
    public function getSelected($airportCodes)
    {
        $requestBody = array(
            array( 'airportCodes' => $airportCodes, ),
        );

        $response = $this->call('GetSelected', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetSelectedResult',
            'AirportDTO'
        );

        $collection = new Collection($response['GetSelectedResult']['AirportDTO']);
        return $collection->map(function ($item) {
            return new AirportDTO($item);
        });
    }

    /**
     * @param AirportDTO $airportDTO
     * @return Collection
     */
    public function find(AirportDTO $airportDTO)
    {
        $requestBody = array(
            array( 'airportDTO' => $airportDTO->toArray(), ),
        );

        $response = $this->call('Find', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'FindResult',
            'AirportDTO'
        );

        $collection = new Collection($response['FindResult']['AirportDTO']);
        return $collection->map(function ($item) {
            return new AirportDTO($item);
        });
    }

    /**
     * @param string $searchTerm
     * @return Collection
     */
    public function search($searchTerm)
    {
        $requestBody = array(
            array( 'searchTerm' => $searchTerm, ),
        );

        $response = $this->call('Search', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'SearchResult',
            'AirportDTO'
        );

        $collection = new Collection($response['SearchResult']['AirportDTO']);
        return $collection->map(function ($item) {
            return new AirportDTO($item);
        });
    }
}
