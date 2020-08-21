<?php

namespace TpaApi\Webservices\Models;

use TpaApi\Webservices\Traits\Collection;

class TransferServiceDTO extends Model
{
    protected $fillable = array(
        'Id',
        'ProviderId',
        'ServiceType',
        'Information',
        'Journeys',
        'ContainsMultipleJourneys',
        'RequiresTwoStepReturnSelectionProcess',
    );

    public function getInformation()
    {
        return new TransferServiceInfoDTO($this->Information);
    }

    public function getJourneys()
    {
        $collection = new Collection($this->Journeys['TransferServiceJourneyDTO']);
        return $collection->map(function ($item) {
            return new TransferServiceJourneyDTO($item);
        });
    }
}