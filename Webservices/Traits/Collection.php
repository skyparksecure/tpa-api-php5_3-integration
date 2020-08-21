<?php

namespace TpaApi\Webservices\Traits;

/**
 * Class Collection
 * @package App\Webservices\Traits
 */
class Collection
{
    protected $items;

    // Constructor
    public function __construct($args = array())
    {
        $this->items = array();
        foreach ($args as $arg) {
            array_push($this->items, $arg);
        }
    }

    // Get first element in the collection
    public function first()
    {
        return (sizeof($this->items) > 0) ? $this->items[0] : null;
    }

    // Get last element in the collection
    public function last()
    {
        return (sizeof($this->items) > 0) ? $this->items[sizeof($this->items) - 1] : null;
    }

    // Map a closure to collection items
    public function map($callback)
    {
        array_walk($this->items, function (&$value, &$key) use ($callback) {
            return $callback($value);
        });
        return $this;
    }

    // Return collection as array - similar to Laravels toArray()
    public function toArray()
    {
        array_walk($this->items, function ($item) {
            if (gettype($item) !== 'array') {
                if (method_exists($item, 'toArray')) {
                    return $item->toArray();
                }
            }
            return $item;
        });
        return json_decode(json_encode($this->items), true);
    }
}