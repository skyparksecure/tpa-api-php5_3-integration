<?php

namespace TpaApi\Webservices\Services;

use TpaApi\Webservices\Models\TermsInformationDTO;
use TpaApi\Webservices\Traits\ExceptionHandler;
use TpaApi\Webservices\WebService;

class InformationService extends WebService
{
    // Constructor
    public function __construct()
    {
        parent::__construct('Information');
    }

    /**
     * @param TermsInformationDTO $termsInformation
     * @return string
     */
    public function getTermsConditions(TermsInformationDTO $termsInformation)
    {
        $requestBody = array(
            array( 'information' => $termsInformation->toArray(), ),
        );

        $response = $this->call('GetTermsConditions', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetTermsConditionsResult',
            null
        );

        return $response['GetTermsConditionsResult'];
    }

    /**
     * @return string
     */
    public function getTermsConditionsForAena()
    {
        $response = $this->call('GetTermsConditionsForAena');

        ExceptionHandler::checkResult(
            $response,
            'GetTermsConditionsForAenaResult',
            null
        );

        return $response['GetTermsConditionsForAenaResult'];
    }
}