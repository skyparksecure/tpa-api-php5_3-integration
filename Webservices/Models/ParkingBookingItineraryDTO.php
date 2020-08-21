<?php

namespace TpaApi\Webservices\Models;

/**
 * Class ParkingBookingItineraryDTO
 * @package App\Webservices\Models
 */
class ParkingBookingItineraryDTO extends Model
{
    protected $fillable = array(
        'QuoteId',
        'ProductId',
        'IPAddress',
        'MemberId',
        'UserId',
        'Customer',
        'Vehicle',
        'Journey',
        'UpsellOptions',
        'ThirdPartyEmailsEnabled',
        'IncomingBookingFee',
        'PaymentMethod',
        'ThirdPartyOrderDetails',
        'ThirdPartyGenericDetails',
    );
}