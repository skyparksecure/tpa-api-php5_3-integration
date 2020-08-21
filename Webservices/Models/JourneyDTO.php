<?php

namespace TpaApi\Webservices\Models;

class JourneyDTO extends Model
{
    protected $fillable = array(
        'DepartureInfo',
        'ArrivalInfo',
        'PassengerCount',
    );

    public function getOrderData()
    {
        return array(
            'DepartureInfo' => $this->DepartureInfo->getOrderData(),
            'ArrivalInfo' => $this->ArrivalInfo->getOrderData(),
            'PassengerCount' => $this->PassengerCount,
        );
    }
}