<?php

namespace TpaApi\Webservices\Models;

class FlightDetailsDTO extends Model
{
    protected $fillable = array(
        'FlightTime',
        'FlightNumber',
        'TerminalId',
    );
}