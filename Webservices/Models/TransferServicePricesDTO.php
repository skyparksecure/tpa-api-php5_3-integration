<?php

namespace TpaApi\Webservices\Models;

class TransferServicePricesDTO extends Model
{
    protected $fillable = array(
        'Currency',
        'Adults',
        'Children',
        'Infants',
        'Vehicles',
        'BookingFee',
        'BookingFeeInPounds',
        'CommissionInPounds',
        'NetPassengerPrice',
        'DiscountAmount',
        'DiscountPercentage',
        'TotalPrice',
        'TotalPayable',
        'TotalPayableUpfront',
        'EstimatedPrices',
        'DiscountAmountInPounds',
    );

    public function getCurrency()
    {
        return new CurrencyDTO($this->Currency);
    }

    public function getAdults()
    {
        return new TransferServicePriceDTO($this->Adults);
    }

    public function getChildren()
    {
        return new TransferServicePriceDTO($this->Children);
    }

    public function getInfants()
    {
        return new TransferServicePriceDTO($this->Infants);
    }

    public function getVehicles()
    {
        return new TransferServicePriceDTO($this->Vehicles);
    }
}