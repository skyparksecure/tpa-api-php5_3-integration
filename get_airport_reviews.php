<?php

namespace TpaApi;

use TpaApi\Webservices\Services\ReviewsService;

require_once 'bootstrap.php';

$reviewsService = new ReviewsService();
$reviews = $reviewsService->getAirportsReviews('MAN', 0, 10);     // TPA API CALL
var_dump($reviews);