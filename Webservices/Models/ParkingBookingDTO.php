<?php

namespace TpaApi\Webservices\Models;

/**
 * Class ParkingBookingDTO
 * @package App\Webservices\Models
 */
class ParkingBookingDTO extends Model
{
    protected $fillable = array(
        'TransactionId',
        'OrderReference',
        'ThirdPartyOrderReference',
        'CarparkReference',
        'OrderDate',
        'Itinerary',
        'Quote',
        'Information',
        'Receipt',
        'OrderStatus'
    );
}