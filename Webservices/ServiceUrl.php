<?php

namespace TpaApi\Webservices;

/**
 * Class ServiceUrl
 * @package App\Webservices
 */
class ServiceUrl
{
    const NAME_SUFFIX = 'Service';
    const EXTENSION = 'svc';
    const QUERY = 'wsdl';

    /**
     * Creates the service name string
     *
     * @param string $serviceName
     * @return null|string
     */
    public static function get($serviceName)
    {
        // Creates the service name WSDL name
        return (self::checkServiceName($serviceName)) ?
            $serviceName . self::NAME_SUFFIX . '.' . self::EXTENSION . '?' . self::QUERY :
            null;
    }

    /**
     * Validates if the service name is identified in the packages config - as an additional precaution
     *
     * @param string $serviceName
     * @return bool
     */
    public static function checkServiceName($serviceName)
    {
        return (in_array($serviceName, json_decode(TPA_SERVICES)));
    }
}