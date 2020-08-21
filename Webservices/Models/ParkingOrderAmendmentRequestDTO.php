<?php

namespace TpaApi\Webservices\Models;

class ParkingOrderAmendmentRequestDTO extends Model
{
    protected $fillable = array(
        'AmendmentToken',
        'AmendmentCost',
        'AmendmentPayableOnArrivalCost',
        'Details',
        'Payment',
        'AmendmentReason',
        'AmendmentInitiator',
    );

    public function getAmendmentCost()
    {
        return new MoneyDTO($this->AmendmentCost);
    }

    public function getAmendmentPayableOnArrivalCost()
    {
        return new MoneyDTO($this->AmendmentPayableOnArrivalCost);
    }

    public function getDetails()
    {
        return new ParkingOrderAmendmentDetailsDTO($this->Details);
    }

    public function getPayment()
    {
        return new ParkingPaymentDTO($this->Payment);
    }
}