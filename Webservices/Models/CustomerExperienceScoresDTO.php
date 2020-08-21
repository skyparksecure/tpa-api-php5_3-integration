<?php

namespace TpaApi\Webservices\Models;

class CustomerExperienceScoresDTO extends Model
{
    protected $fillable = array(
        'PercentageWhoWouldRecommend',
        'NumberOfRetailerRatingReviews',
        'PercentageHappyWithDelivery',
        'NumberOfRetailerDeliveryReviews',
        'PercentageHappyWithCustomerService',
        'NumberOfRetailerServiceReviews',
    );
}