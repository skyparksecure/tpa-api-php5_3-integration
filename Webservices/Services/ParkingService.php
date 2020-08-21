<?php

namespace TpaApi\Webservices\Services;

use TpaApi\Webservices\Exceptions\NoResultsFoundException;
use TpaApi\Webservices\Models\LocationDTO;
use TpaApi\Webservices\Models\ParkingBookingDTO;
use TpaApi\Webservices\Models\ParkingBookingItineraryDTO;
use TpaApi\Webservices\Models\ParkingOrderAmendmentDetailsDTO;
use TpaApi\Webservices\Models\ParkingOrderAmendmentRequestDTO;
use TpaApi\Webservices\Models\ParkingOrderCancellationDetailsDTO;
use TpaApi\Webservices\Models\ParkingOrderCancellationRequestDTO;
use TpaApi\Webservices\Models\ParkingOrderQueryFiltersDTO;
use TpaApi\Webservices\Models\ParkingPaymentDTO;
use TpaApi\Webservices\Models\PaymentFieldDetailedDTO;
use TpaApi\Webservices\Models\PaymentFieldTypeDTO;
use TpaApi\Webservices\Models\PaymentMethodSupportDTO;
use TpaApi\Webservices\Models\PaymentRegistrationDetailsDTO;
use TpaApi\Webservices\Models\ProductDTO;
use TpaApi\Webservices\Models\QuoteDTO;
use TpaApi\Webservices\Models\QuoteItineraryDTO;
use TpaApi\Webservices\Models\SlimParkingOrderCollectionDTO;
use TpaApi\Webservices\Traits\Collection;
use TpaApi\Webservices\Traits\ExceptionHandler;
use TpaApi\Webservices\WebService;
use Exception;

class ParkingService extends WebService
{
    // Constructor
    public function __construct()
    {
        parent::__construct('Parking');
    }

    public function purchase(ParkingBookingItineraryDTO $itinerary)
    {
        $requestBody = array(
            array( 'itinerary' => $itinerary->toArray(), ),
        );

        $response = $this->call('Purchase', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'PurchaseResult',
            null
        );

        return new ParkingBookingDTO($response['PurchaseResult']);
    }

    /**
     * @param ParkingBookingItineraryDTO $itinerary
     * @return ParkingBookingDTO
     * @internal param ParkingBookingItineraryDTO $itineraryDTO
     */
    public function generateBooking(ParkingBookingItineraryDTO $itinerary)
    {
        $requestBody = array(
            array( 'itinerary' => $itinerary->toArray(), ),
        );

        $response = $this->call('GenerateBooking', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GenerateBookingResult',
            null
        );

        return new ParkingBookingDTO($response['GenerateBookingResult']);
    }

    /**
     * @param ParkingPaymentDTO $parkingPayment
     * @param string $orderReference
     * @return ParkingPaymentDTO
     */
    public function processBookingPayment(ParkingPaymentDTO $parkingPayment, $orderReference)
    {
        $requestBody = array(
            array(
                'payment' => $parkingPayment->toArray(),
                'OrderReference' => $orderReference,
            ),
        );

        $response = $this->call('ProcessBookingPayment', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'ProcessBookingPaymentResult',
            null
        );

        return new ParkingPaymentDTO($response['ProcessBookingPaymentResult']);
    }

    /**
     * @param ParkingBookingItineraryDTO $itinerary
     * @param string $orderReference
     * @return ParkingBookingDTO
     */
    public function updateBooking(ParkingBookingItineraryDTO $itinerary, $orderReference)
    {
        $requestBody = array(
            array(
                'itinerary' => $itinerary->toArray(),
                'orderReference' => $orderReference,
            ),
        );

        $response = $this->call('ProcessBookingPayment', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'ProcessBookingPaymentResult',
            null
        );

        return new ParkingBookingDTO($response['ProcessBookingPaymentResult']);
    }

    /**
     * @param string $quoteId
     * @param int $productId
     * @return QuoteDTO
     */
    public function generateQuotation($quoteId, $productId)
    {
        $requestBody = array(
            array(
                'quoteId' => $quoteId,
                'productId' => $productId,
            ),
        );

        $response = $this->call('GenerateQuotation', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GenerateQuotationResult',
            null
        );

        return new QuoteDTO($response['GenerateQuotationResult']);
    }

    /**
     * @param QuoteItineraryDTO $itinerary
     * @return QuoteDTO
     */
    public function searchAvailability(QuoteItineraryDTO $itinerary)
    {
        $requestBody = array(
            array( 'itinerary' => $itinerary->toArray(), ),
        );

        $response = $this->call('SearchAvailability', $requestBody);

        try {
            ExceptionHandler::checkResult(
                $response,
                'SearchAvailabilityResult',
                null
            );
        }
        catch (NoResultsFoundException $exception) {
            return null;
        }
        catch (Exception $exception) {
            var_dump($exception->getMessage());
            die();
        }

        return new QuoteDTO($response['SearchAvailabilityResult']);
    }

    /**
     * @param string $quoteId
     * @return QuoteDTO
     */
    public function retrieveAvailability($quoteId)
    {
        $requestBody = array(
            array( 'quoteId' => $quoteId, ),
        );

        $response = $this->call('RetrieveAvailability', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'RetrieveAvailabilityResult',
            null
        );

        return new QuoteDTO($response['RetrieveAvailabilityResult']);
    }

    /**
     * @param ParkingBookingItineraryDTO $itinerary
     * @param string $paymentMethod
     * @return ParkingBookingDTO
     */
    public function createAsyncPaymentBooking(ParkingBookingItineraryDTO $itinerary, $paymentMethod)
    {
        $requestBody = array(
            array(
                'itinerary' => $itinerary->toArray(),
                'PaymentMethod' => $paymentMethod,
            ),
        );

        $response = $this->call('CreateAsyncPaymentBooking', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'CreateAsyncPaymentBookingResult',
            null
        );

        return new ParkingBookingDTO($response['CreateAsyncPaymentBookingResult']);
    }

    /**
     * @param PaymentRegistrationDetailsDTO $details
     * @return ParkingBookingDTO
     */
    public function registerAsyncPaymentSuccess(PaymentRegistrationDetailsDTO $details)
    {
        $requestBody = array(
            array( 'details' => $details->toArray(), ),
        );

        $response = $this->call('RegisterAsyncPaymentSuccess', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'RegisterAsyncPaymentSuccessResult',
            null
        );

        return new ParkingBookingDTO($response['RegisterAsyncPaymentSuccessResult']);
    }

    /**
     * @param string $quoteId
     * @param string $currency
     * @return QuoteDTO
     */
    public function changeCurrency($quoteId, $currency)
    {
        $requestBody = array(
            array(
                'quoteId' => $quoteId,
                'currency' => $currency,
            ),
        );

        $response = $this->call('ChangeCurrency', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'ChangeCurrencyResult',
            null
        );

        return new QuoteDTO($response['ChangeCurrencyResult']);
    }

    /**
     * @param PaymentRegistrationDetailsDTO $details
     * @return ParkingBookingDTO
     */
    public function registerAsyncPaymentFailure(PaymentRegistrationDetailsDTO $details)
    {
        $requestBody = array(
            array( 'details' => $details->toArray(), ),
        );

        $response = $this->call('RegisterAsyncPaymentFailure', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'RegisterAsyncPaymentFailureResult',
            null
        );

        return new ParkingBookingDTO($response['RegisterAsyncPaymentFailureResult']);
    }

    /**
     * @param int $productId
     * @return string
     */
    public function requestClientToken($productId)
    {
        $requestBody = array(
            array( 'ProductId' => $productId, ),
        );

        $response = $this->call('RequestClientToken', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'RequestClientTokenResult'
        );

        return $response['RequestClientTokenResult'];
    }

    /**
     * @param int $productId
     * @param string $currency
     * @param string $country
     * @return Collection
     */
    public function getSupportedPaymentMethods(
        $productId,
        $currency,
        $country
    ) {
        $requestBody = array(
            array(
                'productId' => $productId,
                'currencyCode' => $currency,
                'countryCode' => $country,
            ),
        );

        $response = $this->call('GetSupportedPaymentMethods', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetSupportedPaymentMethodsResult',
            'PaymentMethodSupportDTO'
        );

        $collection = new Collection($response['GetSupportedPaymentMethodsResult']['PaymentMethodSupportDTO']);
        return $collection->map(function ($item) {
            return new PaymentMethodSupportDTO($item);
        });
    }

    /**
     * @param ParkingOrderCancellationDetailsDTO $details
     * @return ParkingOrderCancellationRequestDTO
     */
    public function requestCancellation(ParkingOrderCancellationDetailsDTO $details)
    {
        $requestBody = array(
            array( 'details' => $details->toArray(), ),
        );

        $response = $this->call('RequestCancellation', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'RequestCancellationResult',
            null
        );

        return new ParkingOrderCancellationRequestDTO($response['RequestCancellationResult']);
    }

    /**
     * @param ParkingOrderCancellationRequestDTO $request
     */
    public function executeCancellation(ParkingOrderCancellationRequestDTO $request)
    {
        $requestBody = array(
            array( 'request' => $request->toArray(), ),
        );

        $this->call('ExecuteCancellation', $requestBody);
    }

    /**
     * @param ParkingOrderAmendmentDetailsDTO $details
     * @return ParkingOrderAmendmentRequestDTO
     */
    public function requestAmendment(ParkingOrderAmendmentDetailsDTO $details)
    {
        $requestBody = array(
            array( 'details' => $details->toArray(), ),
        );

        $response = $this->call('RequestAmendment', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'RequestAmendmentResult',
            null
        );

        return new ParkingOrderAmendmentRequestDTO($response['RequestAmendmentResult']);
    }

    /**
     * @param ParkingOrderAmendmentRequestDTO $request
     */
    public function executeAmendment(ParkingOrderAmendmentRequestDTO $request)
    {
        $requestBody = array(
            array( 'request' => $request->toArray(), ),
        );

        $this->call('ExecuteAmendment', $requestBody);

        return true;
    }

    /**
     * @param string $orderReference
     * @return ParkingBookingDTO
     */
    public function retrieveBooking($orderReference)
    {
        $requestBody = array(
            array( 'orderReference' => $orderReference, ),
        );

        $response = $this->call('RetrieveBooking', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'RetrieveBookingResult',
            null
        );

        return new ParkingBookingDTO($response['RetrieveBookingResult']);
    }

    /**
     * @param int $productId
     * @return Collection
     */
    public function getPaymentFields($productId)
    {
        $requestBody = array(
            array( 'ProductId' => $productId, ),
        );

        $response = $this->call('GetPaymentFields', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetPaymentFieldsResult',
            'PaymentFieldDTO'
        );

        $collection = new Collection($response['GetPaymentFieldsResult']['PaymentFieldDTO']);
        return $collection->map(function ($item) {
            return new PaymentFieldTypeDTO($item);
        });
    }

    /**
     * @param int $productId
     * @return Collection
     */
    public function getDetailedPaymentFields($productId)
    {
        $requestBody = array(
            array( 'productId' => $productId, ),
        );

        $response = $this->call('GetDetailedPaymentFields', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetDetailedPaymentFieldsResult',
            'PaymentFieldDetailedDTO'
        );

        $collection = new Collection($response['GetDetailedPaymentFieldsResult']['PaymentFieldDetailedDTO']);
        return $collection->map(function ($item) {
            return new PaymentFieldDetailedDTO($item);
        });
    }

    /**
     * @param string $term
     * @param string $location
     * @return Collection
     */
    public function searchLocations($term, $location)
    {
        $requestBody = array(
            array(
                'searchTerm' => $term,
                'locationType' => $location,
            ),
        );

        $response = $this->call('SearchLocations', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'SearchLocationsResult',
            'LocationDTO'
        );

        $collection = new Collection($response['SearchLocationsResult']['LocationDTO']);
        return $collection->map(function ($item) {
            return new LocationDTO($item);
        });
    }

    /**
     * @param array $products
     * @param string $currency
     * @return Collection
     */
    public function getProducts($products, $currency)
    {
        $requestBody = array(
            array(
                'productIds' => $products,
                'currencyCode' => $currency,
            ),
        );

        $response = $this->call('GetProducts', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetProductsResult',
            'ProductDTO'
        );

        $collection = new Collection($response['GetProductsResult']['ProductDTO']);
        return $collection->map(function ($item) {
            return new ProductDTO($item);
        });
    }

    public function queryParkingOrders(ParkingOrderQueryFiltersDTO $parkingOrderQueryFiltersDTO)
    {
        $requestBody = array(
            array(
                'filters' => $parkingOrderQueryFiltersDTO->toArray(),
            )
        );

//        try {
//            $response = $this->call('QueryParkingOrders', $requestBody);
//        }
//        catch (Exception $e) {
//            var_dump($this->client->__getLastRequest());
//            var_dump('-------------------------');
//            var_dump($this->client->__getLastResponse());
//        }

        $response = $this->call('QueryParkingOrders', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'QueryParkingOrdersResult',
            null
        );

        return new SlimParkingOrderCollectionDTO($response['QueryParkingOrdersResult']);
    }
}