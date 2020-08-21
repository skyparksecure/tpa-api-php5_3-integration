<?php

namespace TpaApi\Webservices\Models;

use stdClass;
use Exception;

/**
 * Class Model
 * @package App\Webservices\Models
 */
abstract class Model
{
    // Handle a fillable table with properties accepted by the model - similar to Laravels Model
    protected $fillable;

    // Keep assigned properties under the self assigned class property 'attributes', which is a stdClass
    protected $attributes;

    // Constructor
    public function __construct($args = array())
    {
        $this->attributes = new stdClass();

        // Check if model set with fillable table
        if (!isset($this->fillable))
            throw new Exception('Class ' . __CLASS__ . ' has missing $fillable property');

        // Loop through all fillabels and check wheter present in the constructor arguments
        foreach ($this->fillable as $fillable) {
            if (in_array($fillable, array_keys($args))) {
                $this->attributes->$fillable = $args[$fillable];
            }
        }
    }

    // MAGIC set
    public function __set($name, $value)
    {
        if (in_array($name, $this->fillable)) {
            $this->attributes->$name = $value;
        }
        return $this;
    }

    // MAGIC get
    public function __get($name)
    {
        return ($this->attributes->$name) ?: null;
    }

    // Convert model to array - similar to Laravels toArray()
    public function toArray()
    {
        return json_decode(json_encode($this->attributes), true);
    }
}