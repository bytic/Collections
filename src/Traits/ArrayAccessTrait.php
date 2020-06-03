<?php

namespace Nip\Collections\Traits;

/**
 * Class ArrayAccessTrait
 * @package Nip\Collections
 */
trait ArrayAccessTrait
{

    /**
     * Determine if the given configuration option exists.
     *
     * @param  string $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return isset($this->items[$key]) || array_key_exists($key, $this->items);
    }

    /**
     * Get a configuration option.
     *
     * @param  string $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->items[$key];
    }

    /**
     * @param  string $key
     * @param  mixed $value
     * @return void
     */
    public function offsetSet($key, $value)
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }

    /**
     * Unset a configuration option.
     *
     * @inheritdoc
     */
    public function offsetUnset($key)
    {
        unset($this->items[$key]);
    }
}
