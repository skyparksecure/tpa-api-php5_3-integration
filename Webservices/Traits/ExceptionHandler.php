<?php

namespace TpaApi\Webservices\Traits;

use Exception;
use TpaApi\Webservices\Exceptions\InvalidMainResultKeyException;
use TpaApi\Webservices\Exceptions\InvalidObjectResultKeyException;
use TpaApi\Webservices\Exceptions\NoResultsFoundException;

/**
 * Class ExceptionHandler
 * @package TpaApi\Webservices\Traits
 */
class ExceptionHandler
{
    /**
     * @param array $response
     * @param string $responseKey
     * @param string|null $objectKey
     * @throws Exception
     * @throws NoResultsFoundException
     * @internal param string $exceptionClass
     */
    public static function checkResult(
        $response,
        $responseKey,
        $objectKey = null
    ) {
        // Check if main result key is present in response
        if (!array_key_exists($responseKey, $response)) {
            throw new InvalidMainResultKeyException('Key ' . $responseKey . ' not found in response');
        }

        if ($objectKey !== null) {
            // Check object key if needed
            if (!array_key_exists($objectKey, $response[$responseKey])) {
                throw new InvalidObjectResultKeyException('Key ' . $objectKey . ' not found in response results');
            }
        }

        // If empty results, throw an exception accordingly
        $responseEntry = $objectKey ?
            $response[$responseKey][$objectKey] :
            $response[$responseKey];

        if ($responseEntry === null)
            throw new NoResultsFoundException('No results have been found');
    }
}