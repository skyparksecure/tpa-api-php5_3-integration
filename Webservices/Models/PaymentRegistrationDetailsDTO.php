<?php

namespace TpaApi\Webservices\Models;

class PaymentRegistrationDetailsDTO extends Model
{
    protected $fillable = array(
        'ErrorMessage',
        'ErrorType',
        'OrderReference',
        'AuthCode',
        'PaymentMethod',
        'PaymentProvide',
    );
}