<?php

namespace TpaApi\Webservices\Models;

/**
 * Class QuoteItineraryDTO
 * @package TpaApi\Webservices\Models
 */
class QuoteItineraryDTO extends Model
{
    protected $fillable = array(
        'Dates',
        'DiscountCode',
        'DiscountCodeIsValid',
        'DiscountCodeType',
        'Campaign',
        'Location',
        'CurrencySymbol',
    );

    public function getDateRange()
    {
        return new DateRangeDTO($this->Dates);
    }
}