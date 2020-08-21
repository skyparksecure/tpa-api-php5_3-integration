<?php

namespace TpaApi\Webservices\Models;

class TransferServiceProviderDTO extends Model
{
    protected $fillable = array(
        'Id',
        'Name',
        'LogoUrl',
        'ContactInfo',
    );
}