<?php

namespace TpaApi\Webservices\Models;

class ParkingOrderCancellationRequestDTO extends Model
{
    protected $fillable = array(
        'CancellationToken',
        'CancellationFee',
        'RefundAmount',
        'Details',
        'CancellationReason',
        'CancellationInitiator',
    );

    public function getCancellationFee()
    {
        return new MoneyDTO($this->CancellationFee);
    }

    public function getRefundAmount()
    {
        return new MoneyDTO($this->RefundAmount);
    }

    public function getDetails()
    {
        return new ParkingOrderCancellationDetailsDTO($this->Details);
    }
}