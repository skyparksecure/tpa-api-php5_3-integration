<?php

namespace TpaApi\Webservices\Models;

class TransferServiceDirectionalInformationDTO extends Model
{
    protected $fillable = array(
        'MeetingPoint',
        'ArrivalProcedure',
        'AdditionalInformation',
    );
}