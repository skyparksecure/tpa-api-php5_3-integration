<?php

namespace TpaApi\Webservices\Models;

class TransferServiceInfoDTO extends Model
{
    protected $fillable = array(
        'Name',
        'EstimatedTransferTime',
        'EstimatedWaitingTime',
        'DistanceBetweenLocations',
        'Description',
        'AdditionalInformation',
        'OutboundInformation',
        'ReturnInformation',
        'FurtherInformation',
        'InfoSheetUrl',
        'MaximumPassengersPerVehicle',
        'PerVehiclePricing',
    );

    public function getOutboundInformation()
    {
        return new TransferServiceDirectionalInformationDTO($this->OutboundInformation);
    }

    public function getReturnInformation()
    {
        return new TransferServiceDirectionalInformationDTO($this->ReturnInformation);
    }
}