<?php

namespace TpaApi\Webservices\Models;

/**
 * Class QuoteAvailabilityItemDTO
 * @package TpaApi\Webservices\Models
 */
class QuoteAvailabilityItemDTO extends Model
{
    protected $fillable = array(
        'Product',
        'Pricing',
    );

    public function getProduct()
    {
        return new ProductDTO($this->Product);
    }
}