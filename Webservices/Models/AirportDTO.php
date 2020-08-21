<?php

namespace TpaApi\Webservices\Models;

/**
 * Class AirportDTO
 * @package App\Webservices\Models
 */
class AirportDTO extends Model
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
}