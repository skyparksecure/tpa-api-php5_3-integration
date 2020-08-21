<?php

namespace TpaApi\Webservices\Models;

class ReevooLocationDTO extends Model
{
    protected $fillable = array(
        'LocationCode',
        'AverageScore',
        'TotalReviews',
        'TrkRef',
        'OrganisationUrlWithReviews',
    );
}