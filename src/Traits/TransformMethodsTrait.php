<?php

namespace Nip\Collections\Traits;

use JsonSerializable;
use Nip\Collections\AbstractCollection;

/**
 * Class TransformMethodsTrait
 * @package Nip\Collections\Traits
 */
trait TransformMethodsTrait
{
    /**
     * Run a map over each of the items.
     *
     * @param  callable  $callback
     * @return static
     */
    public function map(callable $callback)
    {
        $keys = array_keys($this->items);

        $items = array_map($callback, $this->items, $keys);

        return new static(array_combine($keys, $items));
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_map(function ($value) {
            return $value instanceof AbstractCollection ? $value->toArray() : $value;
        }, $this->items);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return array_map(function ($value) {
            if ($value instanceof JsonSerializable) {
                return $value->jsonSerialize();
            } else {
                return $value;
            }
        }, $this->items);
    }
}
