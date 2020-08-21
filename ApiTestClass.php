<?php

namespace TpaApi;

use Exception;
use TpaApi\Webservices\Exceptions\InvalidMainResultKeyException;
use TpaApi\Webservices\Exceptions\InvalidObjectResultKeyException;
use TpaApi\Webservices\Exceptions\NoResultsFoundException;
use TpaApi\Webservices\Services\AirportService;

class ApiTestClass
{
    protected $service;

    public function __construct(AirportService $airportService)
    {
        $this->service = $airportService;
    }

    public function getAena()
    {
        try {
            return $this->service->all();
        }
        catch (InvalidMainResultKeyException $exception) {
            die(json_encode(array(
                'message' => 'Propably an unknown return structure or bug inside service call - main key definition',
                'exception_message' => $exception->getMessage(),
            )));
        }
        catch (InvalidObjectResultKeyException $exception) {
            die(json_encode(array(
                'message' => 'Propably an unknown return structure or bug inside service call - object key definition',
                'exception_message' => $exception->getMessage(),
            )));
        }
        catch (NoResultsFoundException $exception) {
            // Here we have the choice what to do with empty results
            return array();
        }
        catch (Exception $exception) {
            // An unhandled exception
            die($exception->getMessage());
        }
    }
}