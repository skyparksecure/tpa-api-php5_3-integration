<?php

namespace TpaApi\Webservices\Models;

class TransferServiceJourneyDTO extends Model
{
    protected $fillable = array(
        'JourneyToken',
        'JourneyReference',
        'TerminalId',
        'Terminal',
        'Schedule',
        'Pricing',
        'DiscountInvalidationReason',
        'ArrivalFlightDetails',
        'DepartureFlightDetails',
    );

    public function getTerminal()
    {
        return new TerminalDTO($this->Terminal);
    }

    public function getSchedule()
    {
        return new TransferServiceJourneyScheduleDTO($this->Schedule);
    }

    public function getPricing()
    {
        return new TransferServicePricesDTO($this->Pricing);
    }

    public function getArrivalFlightDetails()
    {
        return new FlightDetailsDTO($this->ArrivalFlightDetails);
    }

    public function getDepartureFlightDetails()
    {
        return new FlightDetailsDTO($this->DepartureFlightDetails);
    }
}