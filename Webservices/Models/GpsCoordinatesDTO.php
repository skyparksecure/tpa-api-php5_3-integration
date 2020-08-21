<?php

namespace TpaApi\Webservices\Models;

class GpsCoordinatesDTO extends Model
{
    protected $fillable = array(
        'Latitude',
        'Longitude',
    );
}