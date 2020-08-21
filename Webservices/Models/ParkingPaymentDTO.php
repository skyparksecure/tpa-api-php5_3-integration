<?php

namespace TpaApi\Webservices\Models;

class ParkingPaymentDTO extends Model
{
    protected $fillable = array(
        'Source',
        'Card',
        'NoPaymentOnPurchase',
        'PayPal',
        'Pnf',
        'StoredCard',
    );

    public function getCard()
    {
        return new CardDTO($this->Card);
    }

    public function getNoPaymentAttribute()
    {
        return new NoPaymentOnPurchaseDTO($this->NoPaymentOnPurchase);
    }
}