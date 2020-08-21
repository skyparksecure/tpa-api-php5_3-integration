<?php

namespace TpaApi;

use TpaApi\Webservices\Services\PortService;

require_once 'bootstrap.php';

$portService = new PortService();
$ports = $portService->all();     // TPA API CALL
var_dump($ports);