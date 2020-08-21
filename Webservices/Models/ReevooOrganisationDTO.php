<?php

namespace TpaApi\Webservices\Models;

class ReevooOrganisationDTO extends Model
{
    protected $fillable = array(
        'TrkRef',
        'Locale',
        'OrganisationUrlWithReviews',
        'Name',
        'ReviewablesPath',
        'CustomerExperienceReviewsPath',
        'CustomerExperienceScores',
    );

    public function getCustomerExperienceScores()
    {
        return new CustomerExperienceScoresDTO($this->CustomerExperienceScores);
    }
}