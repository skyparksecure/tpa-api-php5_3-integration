<?php

namespace TpaApi\Webservices\Models;

class LocationDTO extends Model
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
        'GpsCoodinates',
        'IsPopular',
    );
}