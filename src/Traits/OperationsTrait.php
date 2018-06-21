<?php

namespace Nip\Collections\Traits;

/**
 * Class OperationsTrait
 * @package Nip\Collections\Traits
 */
trait OperationsTrait
{

    /**
     * Returns the number of parameters.
     *
     * @return int The number of parameters
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Returns number of items in $collection.
     *
     * @return int
     */
    public function size()
    {
        $result = 0;
        foreach ($this as $value) {
            $result++;
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->count() < 1;
    }

    /**
     * @return bool
     */
    public function isNotEmpty()
    {
        return !$this->isEmpty();
    }

    /**
     * @return $this
     */
    public function clear()
    {
        $this->rewind();
        $this->items = [];

        return $this;
    }

    /**
     * Key an associative array by a field or using a callback.
     *
     * @param  callable|string $keyBy
     * @return static
     */
    public function keyBy($keyBy)
    {
        $results = [];
        foreach ($this->items as $key => $item) {
            $resolvedKey = is_object($item) ? $item->{$keyBy}  : $item[$keyBy];
            $results[$resolvedKey] = $item;
        }
        return new static($results);
    }

    /**
     * @return void
     */
    abstract public function rewind();
}
