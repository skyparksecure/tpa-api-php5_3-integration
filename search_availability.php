<?php

namespace TpaApi;

use TpaApi\Webservices\Models\QuoteItineraryDTO;
use TpaApi\Webservices\Services\ParkingService;

require_once 'bootstrap.php';

$parkingService = new ParkingService();

$itinerary = new QuoteItineraryDTO(array(
    'Dates' => array(
        'From' => array(
//            'Date' => date_create('+3 day')->format('d-m-Y'),
            'Date' => '20-08-2020',
            'Time' => '12:00',
        ),
        'To' => array(
//            'Date' => date_create('+17 day')->format('d-m-Y'),
            'Date' => '01-09-2020',
            'Time' => '12:00',
        ),
    ),
    'Location' => array(
        'Code' => 'ONT',
    ),
));

$quote = $parkingService->searchAvailability($itinerary);       // TPA API CALL

$quote = json_encode($quote->toArray(), true);
var_dump($quote);

$file = fopen('availability.json', 'w');
fwrite($file, $quote);
fclose($file);
