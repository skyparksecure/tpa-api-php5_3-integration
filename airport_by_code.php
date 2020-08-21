<?php

namespace TpaApi;

use TpaApi\Webservices\Services\AirportService;

require_once 'bootstrap.php';

$airportService = new AirportService();
$airports = $airportService->get('MAN');     // TPA API CALL
var_dump($airports);
