<?php

namespace TpaApi\Webservices\Models;

class TransferServiceJourneyLegDTO extends Model
{
    protected $fillable = array(
        'Arrival',
        'ArrivalDestinationName',
        'Departure',
        'DepartureDestinationName',
        'Duration',
    );
}