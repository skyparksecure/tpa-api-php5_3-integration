<?php

namespace TpaApi;

use TpaApi\Webservices\Models\CardDTO;
use TpaApi\Webservices\Models\CustomerDTO;
use TpaApi\Webservices\Models\JourneyDTO;
use TpaApi\Webservices\Models\JourneyInfoDTO;
use TpaApi\Webservices\Models\ParkingBookingItineraryDTO;
use TpaApi\Webservices\Models\ParkingOrderCancellationDetailsDTO;
use TpaApi\Webservices\Models\ParkingOrderCancellationRequestDTO;
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
            'Time' => '11:00',
        ),
        'To' => array(
            'Date' => date_create('+17 day')->format('d-m-Y'),
            'Time' => '13:00',
        ),
    ),
    'Location' => array(
        'Code' => 'MAN',
    ),
));

$quote = $parkingService->searchAvailability($itinerary);       // TPA API CALL

$quoteAvailabilityItems = $quote->getQuoteAvailabilityItems();
$firstItem = new QuoteAvailabilityItemDTO($quoteAvailabilityItems->last());
$product = $firstItem->getProduct();

//$quote = $parkingService->generateQuotation($quote->Id, $product->Id);      // TPA API CALL

$quoteDates = $quote->getQuoteItinerary()->getDateRange();

//var_dump($quoteDates);
//die();

$uniqid = uniqid();
$name = 'Jan ' . $uniqid;
$customer = new CustomerDTO(array(
    'Name' => $name,
    'EmailAddress' => $uniqid . '@example.com',
    'ContactNumber' => '123145123',
));

$vehicle = new VehicleDTO(array(
    'Make' => 'Audi',
    'Model' => 'Q7',
    'Registration' => uniqid(),
    'Colour' => 'black',
));

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

//echo 'QuoteId: ' . $quote->Id . PHP_EOL;
//echo 'ProductId: ' . $product->Id . PHP_EOL;
//echo 'EmailAddress: ' . $customer->EmailAddress . PHP_EOL;
//echo 'Registration: ' . $vehicle->Registration . PHP_EOL;
//echo 'Departure Date: ' . $departureInfo->Date . PHP_EOL;
//echo 'Arrival Date: ' . $arrivalInfo->Date . PHP_EOL;

$bookingItinerary = new ParkingBookingItineraryDTO(array(
    'QuoteId' => $quote->Id,
    'ProductId' => $product->Id,
    'Customer' => $customer->toArray(),
    'Vehicle' => $vehicle->toArray(),
    'Journey' => $journey->toArray(),
    'PaymentInstructions' => array(
        'AreBeingUsed' => false,
        'PaymentMethodNonce' => null,
    ),
    'PaymentMethod' => null,
    'IPAddress' => null,
    'UserId' => null,
    'MemberId' => null,
));

//var_dump($bookingItinerary);
//die();

echo '#### Purchase booking' . PHP_EOL;
try {
    $booking = $parkingService->purchase($bookingItinerary);     // TPA API CALL
    echo PHP_EOL . '--- Purchase req - success' . PHP_EOL;
    var_dump($parkingService->client->__getLastRequestHeaders());
    var_dump($parkingService->client->__getLastRequest());
    var_dump(PHP_EOL . '--------------------------------------------');
//    echo PHP_EOL . '--- Purchase res - success' . PHP_EOL;
//    var_dump($parkingService->client->__getLastResponseHeaders());
//    var_dump($parkingService->client->__getLastResponse());
}
catch (\Exception $e) {
    echo PHP_EOL . '--- Purchase req - failure' . PHP_EOL;
    var_dump($parkingService->client->__getLastRequestHeaders());
    var_dump($parkingService->client->__getLastRequest());
    var_dump(PHP_EOL . '--------------------------------------------');
    echo PHP_EOL . '--- Purchase res - failure' . PHP_EOL;
    var_dump($parkingService->client->__getLastResponseHeaders());
    var_dump($parkingService->client->__getLastResponse());
    die();
}

//echo 'Order reference:' . PHP_EOL;
//echo $booking->OrderReference . PHP_EOL;
echo '#### Request cancellation of booking' . PHP_EOL;

try {
    $cancellationRequest = new ParkingOrderCancellationDetailsDTO(array( 'OrderReference' => $booking->OrderReference, ));

//    echo PHP_EOL . '--- Requesting cancellation res - success' . PHP_EOL;
//    var_dump($parkingService->client->__getLastResponseHeaders());
//    var_dump($parkingService->client->__getLastResponse());
}
catch (\Exception $exception) {
    die('ParkingOrderCanellationDetailsDTO ' . $exception->getMessage());
}

try {
    $orderCancellation = $parkingService->requestCancellation($cancellationRequest);
    echo PHP_EOL . '--- Requesting cancellation req - success' . PHP_EOL;
    var_dump($parkingService->client->__getLastRequestHeaders());
    var_dump($parkingService->client->__getLastRequest());
    var_dump(PHP_EOL . '--------------------------------------------');
}
catch (\Exception $exception) {
    echo PHP_EOL . '--- Requesting cancellation req - failure' . PHP_EOL;
    var_dump($parkingService->client->__getLastRequestHeaders());
    var_dump($parkingService->client->__getLastRequest());
    var_dump(PHP_EOL . '--------------------------------------------');
    echo PHP_EOL . '--- Requesting cancellation res - failure' . PHP_EOL;
    var_dump($parkingService->client->__getLastResponseHeaders());
    var_dump($parkingService->client->__getLastResponse());
    die();
}

$cancellationRequest = new ParkingOrderCancellationRequestDTO(array(
    'CancellationToken' => $orderCancellation->CancellationToken,
    'CancellationFee' => array(
        'Amount' => 0,
        'Curreny' => 'GBP',
    ),
    'RefundAmount' => array(
        'Amount' => 0,
        'Curreny' => 'GBP',
    ),
    'Details' => array(
       'OrderReference' => $booking->OrderReference,
    ),
    'CancellationReason' => 'This was just a test order',
    'CancellationInitiator' => 'Jan Pedryc',
));

//var_dump($cancellationRequest->toArray());
echo '#### Executing cancellation of booking' . PHP_EOL;

try {
    $cancellationResponse = $parkingService->executeCancellation($cancellationRequest);
    echo PHP_EOL . '--- Executing cancellation req - success' . PHP_EOL;
    var_dump($parkingService->client->__getLastRequestHeaders());
    var_dump($parkingService->client->__getLastRequest());
    var_dump(PHP_EOL . '--------------------------------------------');
//    echo PHP_EOL . '--- Executing cancellation res - failure' . PHP_EOL;
//    var_dump($parkingService->client->__getLastResponseHeaders());
//    var_dump($parkingService->client->__getLastResponse());
}
catch (\Exception $e) {
    echo PHP_EOL . '--- Executing cancellation req - failure' . PHP_EOL;
    var_dump($parkingService->client->__getLastRequestHeaders());
    var_dump($parkingService->client->__getLastRequest());
    var_dump(PHP_EOL . '--------------------------------------------');
    echo PHP_EOL . '--- Executing cancellation res - failure' . PHP_EOL;
    var_dump($parkingService->client->__getLastResponseHeaders());
    var_dump($parkingService->client->__getLastResponse());
    die();
}

var_dump($cancellationResponse);