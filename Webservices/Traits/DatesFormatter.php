<?php

namespace TpaApi\Webservices\Traits;

/**
 * Class DatesFormatter
 * @package TpaApi\Webservices\Traits
 */
class DatesFormatter
{
    // Returns a datetime string preferred by the TPA API
    public static function formatDateTime($date, $time)
    {
        list($day, $month, $year) = explode('/', $date);
        return ($year.'-'.$month.'-'.$day.'T'.$time.':01+00:00');
    }
}