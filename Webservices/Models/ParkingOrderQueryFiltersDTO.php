<?php

namespace TpaApi\Webservices\Models;

/**
 * Class ProductDTO
 * @package TpaApi\Webservices\Models
 */
class ParkingOrderQueryFiltersDTO extends Model
{
    protected $fillable = array(
        'CustomerNameOrEmail',
        'VehicleRegistration',
        'Products',
        'Providers',
        'Suppliers',
        'Locations',
        'RecordsPerPage',
        'PageNumber',
    );
}