<?php

namespace TpaApi\Webservices\Models;

class CountryDTO extends Model
{
    protected $fillable = array(
        'Code',
        'Name',
        'Currency',
    );
}