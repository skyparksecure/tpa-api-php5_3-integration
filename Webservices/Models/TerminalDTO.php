<?php

namespace TpaApi\Webservices\Models;

class TerminalDTO extends Model
{
    protected $fillable = array(
        'Id',
        'Name',
        'EnglishName',
        'LocalisedName',
    );
}