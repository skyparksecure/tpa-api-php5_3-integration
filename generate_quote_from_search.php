<?php

namespace TpaApi;

use TpaApi\Webservices\Models\QuoteAvailabilityItemDTO;
use TpaApi\Webservices\Models\QuoteItineraryDTO;
use TpaApi\Webservices\Services\ParkingService;

require_once 'bootstrap.php';

$parkingService = new ParkingService();
$itinerary = new QuoteItineraryDTO(array(
    'Dates' => array(
        'From' => array(
            'Date' => date_create('+3 day')->format('d-m-Y'),
            'Time' => '12:00',
        ),
        'To' => array(
            'Date' => date_create('+17 day')->format('d-m-Y'),
            'Time' => '12:00',
        ),
    ),
    'Location' => array(
        'Code' => 'MAN',
    ),
));

$quote = $parkingService->searchAvailability($itinerary);       // TPA API CALL


/**
 * Select an availability request for a product
 */

$quoteAvailabilityItems = $quote->getQuoteAvailabilityItems();
$firstItem = new QuoteAvailabilityItemDTO($quoteAvailabilityItems->first());
$product = $firstItem->getProduct();
$quote = $parkingService->generateQuotation($quote->Id, $product->Id);      // TPA API CALL

var_dump($quote);