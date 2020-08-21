<?php

namespace TpaApi;

use TpaApi\Webservices\Services\TransfersService;

require_once 'bootstrap.php';

$transfersService = new TransfersService();
$serviceProviders = $transfersService->getServiceProviders();     // TPA API CALL
var_dump($serviceProviders->first());