<?php

namespace TpaApi\Webservices\Models;

class CustomerDTO extends Model
{
    protected $fillable = array(
        'Name',
        'EmailAddress',
        'ContactNumber',
        'Address',
        'City',
        'Country',
        'Postcode',
        'AgentReference',
    );

    public function getOrderData()
    {
        return array(
            'Name' => $this->Name,
            'EmailAddress' => $this->EmailAddress,
            'ContactNumber' => $this->ContactNumber,
        );
    }
}