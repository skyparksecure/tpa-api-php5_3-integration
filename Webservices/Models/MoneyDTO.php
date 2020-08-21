<?php

namespace TpaApi\Webservices\Models;

class MoneyDTO extends Model
{
    protected $fillable = array(
        'Amount',
        'Currency',
    );
}