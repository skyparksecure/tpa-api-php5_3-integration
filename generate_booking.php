<?php

namespace TpaApi;

use TpaApi\Webservices\Models\CardDTO;
use TpaApi\Webservices\Models\CustomerDTO;
use TpaApi\Webservices\Models\JourneyDTO;
use TpaApi\Webservices\Models\JourneyInfoDTO;
use TpaApi\Webservices\Models\ParkingBookingItineraryDTO;
use TpaApi\Webservices\Models\ParkingPaymentDTO;
use TpaApi\Webservices\Models\QuoteAvailabilityItemDTO;
use TpaApi\Webservices\Models\QuoteItineraryDTO;
use TpaApi\Webservices\Models\VehicleDTO;
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

$quoteAvailabilityItems = $quote->getQuoteAvailabilityItems();
$firstItem = new QuoteAvailabilityItemDTO($quoteAvailabilityItems->first());
$product = $firstItem->getProduct();
$quote = $parkingService->generateQuotation($quote->Id, $product->Id);      // TPA API CALL

$quoteDates = $quote->getQuoteItinerary()->getDateRange();
$uniqid = uniqid();
$name = 'Jan ' . $uniqid;
echo $name . PHP_EOL;

$customer = new CustomerDTO(array(
    'Name' => $name,
    'EmailAddress' => $uniqid . '@example.com',
    'ContactNumber' => '123123123',
));

$reg = substr($uniqid, 0, 5);
$vehicle = new VehicleDTO(array(
    'Make' => 'Audi',
    'Model' => 'Q7',
    'Registration' => $reg,
    'Colour' => 'black',
));

echo 'Registration number: ' . $reg;

$departureInfo = new JourneyInfoDTO(array(
    'Date' => $quoteDates->getFromDateTime(),
    'NumberOfPassengers' => 1,
));

$arrivalInfo = new JourneyInfoDTO(array(
    'Date' => $quoteDates->getToDateTime(),
    'NumberOfPassengers' => 1,
));

$journey = new JourneyDTO(array(
    'DepartureInfo' => $departureInfo->toArray(),
    'ArrivalInfo' => $arrivalInfo->toArray(),
    'PassengerCount' => 1
));

$card = new CardDTO(array(
    'CardHolderName' => $name,
    'CardNumber' => '4485480221084675',
    'ExpiryMonth' => date_create('+1 year')->format('m'),
    'ExpiryYear' => date_create('+1 year')->format('y'),
    'SecurityNumber' => '123',
));

$payment = new ParkingPaymentDTO(array(
    'Source' => 'Card',
    'Card' => $card->toArray(),
));

$bookingItinerary = new ParkingBookingItineraryDTO(array(
    'QuoteId' => $quote->Id,
    'ProductId' => $product->Id,
    'Customer' => $customer->toArray(),
    'Vehicle' => $vehicle->toArray(),
    'Journey' => $journey->toArray(),
    'PaymentMethod' => $payment->toArray(),
));

$booking = $parkingService->generateBooking($bookingItinerary);     // TPA API CALL

var_dump(array_keys($booking->toArray()));