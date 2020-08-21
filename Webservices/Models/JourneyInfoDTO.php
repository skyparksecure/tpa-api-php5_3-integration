<?php

namespace TpaApi\Webservices\Models;

class JourneyInfoDTO extends Model
{
    protected $fillable = array(
        'JourneyReference',
        'Location',
        'Date',
        'Terminal',
        'NumberOfPassengers',
        'PassengerNumber',
        'TargetDestination',
    );

    public function getOrderData()
    {
        return array(
            'Date' => $this->Date,
            'NumberOfPassengers' => $this->NumberOfPassengers,
        );
    }
}