<?php

namespace TpaApi;

require_once 'bootstrap.php';
require_once 'ApiTestClass.php';

use TpaApi\Webservices\Services\AirportService;

$testClass = new ApiTestClass(new AirportService());

var_dump($testClass);
