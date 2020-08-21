<?php

namespace TpaApi\Webservices\Models;

use TpaApi\Webservices\Traits\Collection;

class TransferServiceJourneyScheduleDTO extends Model
{
    protected $fillable = array(
        'Departure',
        'Arrival',
        'Changes',
        'Checkin',
        'Duration',
        'Legs',
    );

    public function getLegs()
    {
        $collection = new Collection($this->Legs['TransferServiceJourneyLegDTO']);
        return $collection->map(function ($item) {
            return new TransferServiceJourneyLegDTO($item);
        });
    }
}