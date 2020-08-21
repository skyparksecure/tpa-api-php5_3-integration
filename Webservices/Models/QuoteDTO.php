<?php

namespace TpaApi\Webservices\Models;

use TpaApi\Webservices\Traits\Collection;

/**
 * Class QuoteDTO
 * @package TpaApi\Webservices\Models
 */
class QuoteDTO extends Model
{
    protected $fillable = array(
        'Id',
        'Type',
        'Currency',
        'Availability',
        'Pricing',
        'QuoteItinerary',
    );

    public function getQuoteAvailabilityItems()
    {
        $collection = new Collection($this->Availability['QuoteAvailabilityItemDTO']);
        return $collection->map(function ($value) {
            return new QuoteAvailabilityItemDTO($value);
        });
    }

    public function getQuoteItinerary()
    {
        return new QuoteItineraryDTO($this->QuoteItinerary);
    }
}