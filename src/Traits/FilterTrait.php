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
}