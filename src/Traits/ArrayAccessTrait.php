<?php

namespace Nip\Collections\Traits;

/**
 * Class ArrayAccessTrait
 * @package Nip\Collections
 */
trait ArrayAccessTrait
{
    /**
     * Returns `true` if the given offset exists in this array.
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php ArrayAccess::offsetExists()
     *
     * @param array-key $offset The offset to check.
     */
    public function offsetExists($key): bool
    {
        if (isset($this->items[$key])) {
            return true;
        }

        if (is_int($key) || is_string($key)) {
            return array_key_exists($key, $this->items);
        }
        return false;
    }

    /**
     * Get a configuration option.
     *
     * @param string $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->items[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
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
