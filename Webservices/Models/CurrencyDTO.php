<?php

namespace TpaApi\Webservices\Models;

class CurrencyDTO extends Model
{
    protected $fillable = array(
        'Code',
        'Name',
        'Symbol',
    );
}