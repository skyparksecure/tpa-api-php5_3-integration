<?php

namespace TpaApi\Webservices\Models;

class PaymentFieldDetailedDTO extends Model
{
    protected $fillable = array(
        'Field',
        'Type',
        'PageNumber',
        'IsRequired',
        'ProductOrServiceId',
    );

    public function getType()
    {
        return new PaymentFieldTypeDTO($this->Type);
    }
}