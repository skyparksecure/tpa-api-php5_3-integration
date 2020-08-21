<?php

namespace TpaApi\Webservices\Models;

class ReviewsDTO extends Model
{
    protected $fillable = array(
        'ReviewStatistics',
        'ListOfReviews'
    );
}