<?php

namespace TpaApi;

require_once 'bootstrap.php';

use TpaApi\Webservices\Models\CardDTO;
use TpaApi\Webservices\Models\CustomerDTO;
use TpaApi\Webservices\Models\JourneyDTO;
use TpaApi\Webservices\Models\JourneyInfoDTO;
use TpaApi\Webservices\Models\ParkingBookingDTO;
use TpaApi\Webservices\Models\ParkingBookingItineraryDTO;
use TpaApi\Webservices\Models\ParkingPaymentDTO;
use TpaApi\Webservices\Models\QuoteAvailabilityItemDTO;
use TpaApi\Webservices\Models\QuoteItineraryDTO;
use TpaApi\Webservices\Models\VehicleDTO;
use TpaApi\Webservices\Services\AirportService;
use TpaApi\Webservices\Services\ParkingService;

echo '-- TPA API PHP5.3 [compatibility test] ### START' . PHP_EOL;


$timeSum = 0.0;
$testCounter = 10;

for ($i = 0; $i < $testCounter; $i += 1) {



    /**
     * ParkingService - Test availability
     */
    $parkingService = new ParkingService();

    /**
     * Get availability
     */

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

    $startTimeGetAvailability = microtime(true);

    $quote = $parkingService->searchAvailability($itinerary);

    $time = (microtime(true) - $startTimeGetAvailability);
    $timeSum += $time;
    echo 'GetAvailability: ' .  $time . ' seconds' . PHP_EOL;

//    /**
//     * Select an availability request for a product
//     */
//
//    $generateQuotationTime = microtime(true);
//
//    $quoteAvailabilityItems = $quote->getQuoteAvailabilityItems();
//    $firstItem = new QuoteAvailabilityItemDTO($quoteAvailabilityItems->first());
//    $product = $firstItem->getProduct();
//    $quote = $parkingService->generateQuotation($quote->Id, $product->Id);
//
//    echo 'GenerateQuotation: ' . (microtime(true) - $generateQuotationTime) . ' seconds' . PHP_EOL;

//    /**
//     * Handle a booking
//     */
//
//    $generateBookingTime = microtime(true);
//
//    $quoteDates = $quote->getQuoteItinerary()->getDateRange();
//    $uniqid = uniqid();
//    $name = 'Jan ' . $uniqid;
//    $customer = new CustomerDTO(array(
//        'Name' => $name,
//        'EmailAddress' => $uniqid . '@example.com',
//        'ContactNumber' => '123123123',
//    ));
//
//    $vehicle = new VehicleDTO(array(
//        'Make' => 'Audi',
//        'Model' => 'Q7',
//        'Registration' => substr($uniqid, 0, 5),
//        'Colour' => 'black',
//    ));
//
//    $departureInfo = new JourneyInfoDTO(array(
//        'Date' => $quoteDates->getFromDateTime(),
//        'NumberOfPassengers' => 1,
//    ));
//
//    $arrivalInfo = new JourneyInfoDTO(array(
//        'Date' => $quoteDates->getToDateTime(),
//        'NumberOfPassengers' => 1,
//    ));
//
//    $journey = new JourneyDTO(array(
//        'DepartureInfo' => $departureInfo->toArray(),
//        'ArrivalInfo' => $arrivalInfo->toArray(),
//        'PassengerCount' => 1
//    ));
//
//    $card = new CardDTO(array(
//        'CardHolderName' => $name,
//        'CardNumber' => '4485480221084675',
//        'ExpiryMonth' => date_create('+1 year')->format('m'),
//        'ExpiryYear' => date_create('+1 year')->format('y'),
//        'SecurityNumber' => '123',
//    ));
//
//    $payment = new ParkingPaymentDTO(array(
//        'Source' => 'Card',
//        'Card' => $card->toArray(),
//    ));
//
//    $bookingItinerary = new ParkingBookingItineraryDTO(array(
//        'QuoteId' => $quote->Id,
//        'ProductId' => $product->Id,
//        'Customer' => $customer->toArray(),
//        'Vehicle' => $vehicle->toArray(),
//        'Journey' => $journey->toArray(),
//        'PaymentMethod' => $payment->toArray(),
//    ));
//
//    $booking = $parkingService->generateBooking($bookingItinerary);
//
//    echo 'GenerateBooking: ' . (microtime(true) - $generateBookingTime) . ' seconds' . PHP_EOL;
//
//    $retrieveBookingTime = microtime(true);
//
//    $transactionId = $booking->TransactionId;
//    $orderRef = $booking->OrderReference;
//
//    $booking =  $parkingService->retrieveBooking($orderRef);
//
//    echo 'RetrieveBooking: ' . (microtime(true) - $retrieveBookingTime) . ' seconds' . PHP_EOL;
}

$results = array(
    'counter' => $testCounter,
    'sum' => $timeSum . ' seconds',
    'average' => ($timeSum / $testCounter) . ' seconds',
);

var_dump($results);

//var_dump(array_keys($booking->toArray()));

echo '-- TPA API PHP5.3 [compatibility test] ### FINISH' . PHP_EOL;
