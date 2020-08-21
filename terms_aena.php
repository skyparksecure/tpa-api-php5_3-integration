<?php

namespace TpaApi;

use TpaApi\Webservices\Services\InformationService;

require_once 'bootstrap.php';

$informationService = new InformationService();
$terms = $informationService->getTermsConditionsForAena();    // TPA API CALL
var_dump($terms);
