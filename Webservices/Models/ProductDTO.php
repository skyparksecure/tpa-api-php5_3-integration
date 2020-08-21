<?php

namespace TpaApi\Webservices\Models;

/**
 * Class ProductDTO
 * @package TpaApi\Webservices\Models
 */
class ProductDTO extends Model
{
    protected $fillable = array(
        'Id',
        'Name',
        'Type',
        'SubType',
        'CoverType',
        'Url',
        'ImageUrl',
        'LogoUrl',
        'GpsCoordinates',
        'Details',
        'ReviewStatistics',
        'UpsellOptions',
        'PurchaseModel',
        'LinkedProductId',
        'Terminals',
        'DidstanceFromAirportInMeters',
        'Status',
        'LocationCode',
        'Location',
    );
}