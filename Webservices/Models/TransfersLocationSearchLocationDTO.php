<?php

namespace TpaApi\Webservices\Models;

class TransfersLocationSearchLocationDTO extends Model
{
    protected $fillable = array(
        'Code',
        'Name',
        'LocalisedName',
        'Type',
        'IsPopular',
        'GpsCoordinates',
        'Country',
    );

    public function getGpsCoordinates()
    {
        return new GpsCoordinatesDTO($this->GpsCoordinates);
    }

    public function getCountry()
    {
        return new CountryDTO($this->Country);
    }
}