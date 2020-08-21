<?php

namespace TpaApi\Webservices\Models;

use TpaApi\Webservices\Traits\Collection;

class PortDTO extends Model
{
    protected $fillable = array(
        'Type',
        'Code',
        'Name',
        'Url',
        'Language',
        'LocalisedName',
        'Country',
        'Terminals',
        'Reviews',
        'GpsCoordinates',
        'IsPopular',
    );

    public function getCountry()
    {
        return new CountryDTO($this->Country);
    }

    public function getTerminals()
    {
        $collection = new Collection($this->Terminals['TerminalDTO']);
        return $collection->map(function ($item) {
            return new TerminalDTO($item);
        });
    }

    public function getReviews()
    {
        return new ReviewsDTO($this->Reviews);
    }

    public function getGpsCoordinates()
    {
        return new GpsCoordinatesDTO($this->GpsCoordinates);
    }
}