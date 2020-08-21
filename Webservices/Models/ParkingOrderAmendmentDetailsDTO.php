<?php

namespace TpaApi\Webservices\Models;

class ParkingOrderAmendmentDetailsDTO extends Model
{
    protected $fillable = array(
        'OrderReference',
        'PassengerNumber',
        'NumberOfPassengers',
        'DropOffDate',
        'DropOffTerminalId',
        'DropOffReference',
        'ReturnDate',
        'ReturnTerminalId',
        'ReturnReference',
        'CustomerName',
        'CustomerContactNumber',
        'CustomerEmailAddress',
        'CustomerAddress',
        'CustomerPostcode',
        'CustomerCultureCode',
        'VehicleMake',
        'VehicleModel',
        'VehicleColour',
        'VehicleRegistration',
    );
}