<?php

namespace TpaApi\Webservices\Models;

class TermsInformationDTO extends Model
{
    protected $fillable = array(
        'Type',
        'Locale',
        'PhoneNumber',
        'EmailAddress',
        'ContactUrl',
        'ContactLinkText',
        'CompanyName',
        'TransferServiceProviderId',
        'MemberUrl',
    );
}