<?php

namespace TpaApi\Webservices\Models;

class VehicleDTO extends Model
{
    protected $fillable = array(
        'Make',
        'Model',
        'Registration',
        'Colour',
    );

    public function getOrderData()
    {
        return $this->toArray();
    }
}