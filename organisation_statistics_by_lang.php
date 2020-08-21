<?php

namespace TpaApi;

use TpaApi\Webservices\Services\ReevooService;

require_once 'bootstrap.php';

$reevooService = new ReevooService();
$stats = $reevooService->getOrganisationStatistics('en');     // TPA API CALL
var_dump($stats);