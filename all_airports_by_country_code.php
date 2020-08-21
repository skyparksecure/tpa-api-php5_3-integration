<?php

namespace TpaApi;

use TpaApi\Webservices\Services\AirportService;

require_once 'bootstrap.php';

$airportService = new AirportService();
$airports = $airportService->allByCountry('GB');     // TPA API CALL
var_dump($airports);
