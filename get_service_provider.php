<?php

namespace TpaApi;

use TpaApi\Webservices\Services\TransfersService;

require_once 'bootstrap.php';

$transfersService = new TransfersService();
$serviceProvider = $transfersService->getServiceProvider(5);     // TPA API CALL
var_dump($serviceProvider);