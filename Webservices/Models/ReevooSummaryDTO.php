<?php

namespace TpaApi\Webservices\Models;

class ReevooSummaryDTO extends Model
{
    protected $fillable = array(
        'Id',
        'Sku',
        'Name',
        'AverageScore',
        'ReviewCount',
        'TrkRef',
        'DownloadedDateTime',
        'Locale',
        'ReviewsPath',
    );
}