<?php

namespace Nip\Collections\Traits;

use Nip\Utility\Arr;

/**
 * Trait FilterTrait
 * @package Nip\Collections\Traits
 */
trait FilterTrait
{
    /**
     * Get the first item from the collection passing the given truth test.
     *
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    public function first(callable $callback = null, $default = null)
    {
        return Arr::first($this->items, $callback, $default);
    }

    /**
     * Get the items with the specified keys.
     *
     * @param  mixed  $keys
     * @return static
     */
    public function only($keys)
    {
        if (is_null($keys)) {
            return new static($this->items);
        }
        $keys = is_array($keys) ? $keys : func_get_args();
        return new static(Arr::only($this->items, $keys));
    }

    /**
     * Splice a portion of the underlying collection array.
     *
     * @param int $offset
     * @param int|null $length
     * @param mixed $replacement
     * @return static
     */
    public function splice($offset, $length = null, $replacement = [])
    {
        if (func_num_args() === 1) {
            return new static(array_splice($this->items, $offset));
        }

        return new static(array_splice($this->items, $offset, $length, $replacement));
    }
}
