<?php

namespace TpaApi;

use TpaApi\Webservices\Services\CountryService;

require_once 'bootstrap.php';

$countryService = new CountryService();
$countries = $countryService->all();     // TPA API CALL
var_dump($countries);