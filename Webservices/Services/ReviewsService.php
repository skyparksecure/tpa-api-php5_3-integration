<?php

namespace TpaApi\Webservices\Services;

use TpaApi\Webservices\Models\ReviewsDTO;
use TpaApi\Webservices\Models\ReviewStatisticsDTO;
use TpaApi\Webservices\Traits\ExceptionHandler;
use TpaApi\Webservices\WebService;

class ReviewsService extends WebService
{
    // Constructor
    public function __construct()
    {
        parent::__construct('Reviews');
    }

    /**
     * @param string $airportCode
     * @param int $minRating
     * @param int $maxReviews
     * @return ReviewsDTO
     */
    public function getAirportsReviews($airportCode, $minRating, $maxReviews)
    {
        $requestBody = array(
            array(
                'airportCode' => $airportCode,
                'minRating' => $minRating,
                'maxReviews' => $maxReviews,
            ),
        );

        $response = $this->call('GetAirportReviews', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetAirportReviewsResult',
            null
        );

        return new ReviewsDTO($response['GetAirportReviewsResult']);
    }

    /**
     * @param string $airportCode
     * @return ReviewStatisticsDTO
     */
    public function getAirportReviewStatistics($airportCode)
    {
        $requestBody = array(
            array( 'airportCode' => $airportCode, ),
        );

        $response = $this->call('GetAirportReviewStatistics', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetAirportReviewStatisticsResult',
            null
        );

        return new ReviewStatisticsDTO($response['GetAirportReviewStatisticsResult']);
    }

    /**
     * @param int $vendorId
     * @param int $minRating
     * @param int $maxReviews
     * @return ReviewsDTO
     */
    public function getVendorReviews($vendorId, $minRating, $maxReviews)
    {
        $requestBody = array(
            array(
                'vendorId' => $vendorId,
                'minRating' => $minRating,
                'maxReviews' => $maxReviews,
            ),
        );

        $response = $this->call('GetVendorReviews', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetVendorReviewsResult',
            null
        );

        return new ReviewsDTO($response['GetVendorReviewsResult']);
    }

    /**
     * @param int $vendorId
     * @return ReviewStatisticsDTO
     */
    public function getVendorReviewStatistics($vendorId)
    {
        $requestBody = array(
            array( 'vendorId' => $vendorId, ),
        );

        $response = $this->call('GetVendorReviewStatistics', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetVendorReviewStatisticsResult',
            null
        );

        return new ReviewStatisticsDTO($response['GetVendorReviewStatisticsResult']);
    }

    /**
     * @param int $productId
     * @param int $minRating
     * @param int $maxReviews
     * @return ReviewsDTO
     */
    public function getProductReviews($productId, $minRating, $maxReviews)
    {
        $requestBody = array(
            array(
                'productId' => $productId,
                'minRating' => $minRating,
                'maxReviews' => $maxReviews,
            ),
        );

        $response = $this->call('GetProductReviews', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetProductReviewsResult',
            null
        );

        return new ReviewsDTO($response['GetProductReviewsResult']);
    }

    /**
     * @param int $productId
     * @return ReviewStatisticsDTO
     */
    public function getProductReviewStatistics($productId)
    {
        $requestBody = array(
            array( 'productId' => $productId, ),
        );

        $response = $this->call('GetProductReviewStatistics', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetProductReviewStatisticsResult',
            null
        );

        return new ReviewStatisticsDTO($response['GetProductReviewStatisticsResult']);
    }

    /**
     * @param int $minRating
     * @param int $maxReviews
     * @return ReviewsDTO
     */
    public function getSalesChannelReviews($minRating, $maxReviews)
    {
        $requestBody = array(
            array(
                'minRating' => $minRating,
                'maxReviews' => $maxReviews,
            ),
        );

        $response = $this->call('GetSalesChannelReviews', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetSalesChannelReviewsResult',
            null
        );

        return new ReviewsDTO($response['GetSalesChannelReviewsResult']);
    }

    /**
     * @return ReviewStatisticsDTO
     */
    public function getSalesChannelReviewStatistics()
    {
        $response = $this->call('GetSalesChannelReviewStatistics');

        ExceptionHandler::checkResult(
            $response,
            'GetSalesChannelReviewStatisticsResult',
            null
        );

        return new ReviewStatisticsDTO($response['GetSalesChannelReviewStatisticsResult']);
    }

    /**
     * @return ReviewStatisticsDTO
     */
    public function getAllSalesChannelReviewStatistics()
    {
        $response = $this->call('GetAllSalesChannelsReviewStatistics');

        ExceptionHandler::checkResult(
            $response,
            'GetAllSalesChannelsReviewStatisticsResult',
            null
        );

        return new ReviewStatisticsDTO($response['GetAllSalesChannelsReviewStatisticsResult']);
    }

    /**
     * @param string $portCode
     * @param int $minRating
     * @param int $maxReviews
     * @return ReviewsDTO
     */
    public function getPortReviews($portCode, $minRating, $maxReviews)
    {
        $requestBody = array(
            array(
                'portCode' => $portCode,
                'minRating' => $minRating,
                'maxReviews' => $maxReviews,
            ),
        );

        $response = $this->call('GetPortReviews', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetPortReviewsResult',
            null
        );

        return new ReviewsDTO($response['GetPortReviewsResult']);
    }

    /**
     * @param string $portCode
     * @return ReviewStatisticsDTO
     */
    public function getPortReviewStatistics($portCode)
    {
        $requestBody = array(
            array( 'portCode' => $portCode, ),
        );

        $response = $this->call('GetPortReviewStatistics', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetPortReviewStatisticsResult',
            null
        );

        return new ReviewStatisticsDTO($response['GetPortReviewStatisticsResult']);
    }
}