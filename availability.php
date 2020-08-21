<?php

namespace TpaApi;

use TpaApi\Webservices\Models\QuoteItineraryDTO;
use TpaApi\Webservices\Services\ParkingService;

require_once 'bootstrap.php';

$parkingService = new ParkingService();


$availableLocations = array(
    'MAN',  // Manchester
    'LPL',  // Liverpool
    'LGW',  // Gatwick
);

$locationTimeSeconds = array(
    'MAN' => 0.0,
    'LPL' => 0.0,
    'LGW' => 0.0,
);

foreach ($availableLocations as $location) {
    echo '++++ Location: ' . $location . ' ++++' . PHP_EOL;

    for ($i = 0; $i < 10; $i++) {

        $dateStart = rand(3, 10);
        $dateEnd = rand(12, 25);
        $timeStart = rand(1, 23);
        $timeEnd = rand(1, 23);

        $dateStart = date_create('+' . $dateStart . ' day')->format('d-m-Y');
        $dateEnd = date_create('+' . $dateEnd . ' day')->format('d-m-Y');
        $timeStart = $timeStart . ':00';
        $timeEnd = $timeEnd . ':00';

        $itinerary = new QuoteItineraryDTO(array(
            'Dates' => array(
                'From' => array(
                    'Date' => $dateStart,
                    'Time' => $timeStart,
                ),
                'To' => array(
                    'Date' => $dateEnd,
                    'Time' => $timeEnd,
                ),
            ),
            'Location' => array(
                'Code' => $location,
            ),
        ));

        $tStart = microtime(true);
        $quote = $parkingService->searchAvailability($itinerary);       // TPA API CALL
        $tEnd = microtime(true);

        $tDelta = $tEnd - $tStart;
        echo intval($i + 1) . '. ' . $quote->Id . ' took ' . $tDelta . ' seconds [' .
            $dateStart . ' ' . $timeStart . ' - ' . $dateEnd . ' ' . $timeEnd . ']' . PHP_EOL;
        $locationTimeSeconds[$location] += $tDelta;
    }
}

echo PHP_EOL . '---- Time on average based on location ----' . PHP_EOL . PHP_EOL;

foreach ($locationTimeSeconds as $location => $time) {
    echo $location . ': ' . floatval($time / 10) . ' seconds' . PHP_EOL;
}

die();