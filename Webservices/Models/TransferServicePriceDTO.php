<?php

namespace TpaApi\Webservices\Models;

class TransferServicePriceDTO extends Model
{
    protected $fillable = array(
        'Price',
        'Quantity',
        'Total',
    );
}