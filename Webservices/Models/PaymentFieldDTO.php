<?php

namespace TpaApi\Webservices\Models;

class PaymentFieldDTO extends Model
{
    protected $fillable = array(
        'FieldId',
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