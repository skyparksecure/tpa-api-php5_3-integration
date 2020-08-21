<?php

namespace TpaApi\Webservices\Services;

use TpaApi\Webservices\Models\CardDTO;
use TpaApi\Webservices\Models\StoredCardDTO;
use TpaApi\Webservices\Traits\Collection;
use TpaApi\Webservices\Traits\ExceptionHandler;
use TpaApi\Webservices\WebService;

class PaymentService extends WebService
{
    // Constructor
    public function __construct()
    {
        parent::__construct('Payment');
    }

    /**
     * @param string $payerReference
     * @param string $defaultCardRef
     * @return Collection
     */
    public function getStoredCards($payerReference, $defaultCardRef)
    {
        $requestBody = array(
            array(
                'PayerReference' => $payerReference,
                'DefaultCardRef' => $defaultCardRef,
            )
        );

        $response = $this->call('GetStoredCards', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'GetStoredCardsResult',
            'StoredCardDTO'
        );

        $collection = new Collection($response['GetStoredCardsResult']['StoredCardDTO']);
        return $collection->map(function ($item) {
            return new StoredCardDTO($item);
        });
    }

    /**
     * @param CardDTO $card
     * @param string $payerReference
     * @param string $cardName
     * @return StoredCardDTO
     */
    public function addNewStoredCard(CardDTO $card, $payerReference, $cardName)
    {
        $requestBody = array(
            array(
                'Card' => $card->toArray(),
                'PayerReference' => $payerReference,
                'CardName' => $cardName,
            ),
        );

        $response = $this->call('AddNewStoredCard', $requestBody);

        ExceptionHandler::checkResult(
            $response,
            'AddNewStoredCardResult',
            null
        );

        return new StoredCardDTO($response['AddNewStoredCardResult']);
    }

    /**
     * @param string $cardRef
     */
    public function removeStoredCard($cardRef)
    {
        $requestBody = array(
            array( 'CardRef' => $cardRef, ),
        );

        $this->call('RemoveStoredCard', $requestBody);
    }
}