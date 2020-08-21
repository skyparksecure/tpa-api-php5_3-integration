<?php

namespace TpaApi\Webservices\Models;

class CardDTO extends Model
{
    protected $fillable = array(
        'CardHolderName',
        'CardType',
        'CardNumber',
        'ExpiryMonth',
        'ExpiryYear',
        'SecurityNumber',
    );

    public function getOrderData()
    {
        return $this->toArray();
    }
}