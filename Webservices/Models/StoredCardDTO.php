<?php

namespace TpaApi\Webservices\Models;

class StoredCardDTO extends Model
{
    protected $fillable = array(
        'PayerReference',
        'Name',
        'LastFourDigits',
        'CardRef',
    );
}