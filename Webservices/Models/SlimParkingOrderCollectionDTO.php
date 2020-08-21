<?php

namespace TpaApi\Webservices\Models;

/**
 * Class ProductDTO
 * @package TpaApi\Webservices\Models
 */
class SlimParkingOrderCollectionDTO extends Model
{
    protected $fillable = array(
        'PageNumber',
        'RecordsPerPage',
        'TotalRecords',
        'TotalPages',
        'Items',
    );
}