<?php

namespace TpaApi\Webservices\Models;

use TpaApi\Webservices\Traits\DatesFormatter;

class DateRangeDTO extends Model
{
    protected $fillable = array(
        'From',
        'To',
    );

    public function getFromDateTime()
    {
        $fromDateTime = new DateTimeDTO($this->From);
        return DatesFormatter::formatDateTime(
            $fromDateTime->Date,
            $fromDateTime->Time
        );
    }

    public function getToDateTime()
    {
        $toDateTime = new DateTimeDTO($this->To);
        return DatesFormatter::formatDateTime(
            $toDateTime->Date,
            $toDateTime->Time
        );
    }
}
