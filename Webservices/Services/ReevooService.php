<?php

namespace TpaApi\Webservices\Services;

use TpaApi\Webservices\Models\ReevooLocationDTO;
use TpaApi\Webservices\Models\ReevooOrganisationDTO;
use TpaApi\Webservices\Models\ReevooSummaryDTO;
use TpaApi\Webservices\Traits\Collection;
use TpaApi\Webservices\Traits\ExceptionHandler;
use TpaApi\Webservices\WebService;

class ReevooService extends WebService
{
    // Constructor
    public function __construct()
    {
        parent::__construct('Reevoo');
    }

    /**
     * @param string $languageCode
     * @return ReevooOrganisationDTO
     */
    public function getOrganisationStatistics($languageCode)
    {
        $requestBody = array(
            array( 'languageCode' => $languageCode, ),
        );

        $response = $this->call('GetOrganisationStatistics', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetOrganisationStatisticsResult',
            null
        );

        return new ReevooOrganisationDTO($response['GetOrganisationStatisticsResult']);
    }

    /**
     * @param string $locale
     * @param int $productId
     * @return ReevooSummaryDTO
     */
    public function getProductSummary($locale, $productId)
    {
        $requestBody = array(
            array(
                'locale' => $locale,
                'productId' => $productId,
            ),
        );

        $response = $this->call('GetProductSummary', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetProductSummaryResult',
            null
        );

        return new ReevooSummaryDTO($response['GetProductSummaryResult']);
    }

    /**
     * @param string $languageCode
     * @param array $productIds
     * @return Collection
     */
    public function getProductSummaryList($languageCode, $productIds)
    {
        $requestBody = array(
            array(
                'languageCode' => $languageCode,
                'productIds' => $productIds,
            ),
        );

        $response = $this->call('GetProductSummaryList', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetProductSummaryListResult',
            'ReevooSummaryDTO'
        );

        $collection = new Collection($response['GetProductSummaryListResult']['ReevooSummaryDTO']);
        return $collection->map(function ($item) {
            return new ReevooSummaryDTO($item);
        });
    }

    /**
     * @param string $locale
     * @param string $locationCode
     * @return Collection
     */
    public function getLocationAverageScore($locale, $locationCode)
    {
        $requestBody = array(
            array(
                'locale' => $locale,
                'locationCode' => $locationCode,
            ),
        );

        $response = $this->call('GetLocationAverageScore', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetLocationAverageScoreResult',
            'ReevooLocationDTO'
        );

        $collection = new Collection($response['GetLocationAverageScoreResult']['ReevooLocationDTO']);
        return $collection->map(function ($item) {
            return new ReevooLocationDTO($item);
        });
    }
}