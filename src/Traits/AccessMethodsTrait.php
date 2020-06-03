<?php

namespace Nip\Collections\Traits;

/**
 * Class AccessMethodsTrait
 * @package Nip\Collections\Traits
 */
trait AccessMethodsTrait
{

    /**
     * @param array $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * {@inheritDoc}
     */
    public function add($element, $key = null)
    {
        $this->set($key, $element);
    }

    /**
     * @param $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->offsetSet($key, $value);
    }

    /**
     * Returns a parameter by name.
     *
     * @param string $key The key
     * @param mixed $default The default value if the parameter key does not exist
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if ($this->offsetExists($key)) {
            return $this->offsetGet($key);
        }

        return value($default);
    }

    /**
     * @return boolean
     * @param string $key
     */
    public function has($key)
    {
        $keys = is_array($key) ? $key : func_get_args();

        foreach ($keys as $value) {
            if (!$this->offsetExists($value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns the parameters.
     *
     * @return array An array of parameters
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * Returns the parameter keys.
     *
     * @return array An array of parameter keys
     */
    public function keys()
    {
        return array_keys($this->items);
    }

    /**
     * Returns the parameter values.
     *
     * @return array An array of parameter values
     */
    public function values()
    {
        return array_values($this->items);
    }

    /**
     * Remove an item from the collection by key.
     *
     * @param string|array $keys
     * @return $this
     */
    public function forget($keys)
    {
        foreach ((array)$keys as $key) {
            $this->offsetUnset($key);
        }

        return $this;
    }

    /**
     * @param string $key
     * @return null
     */
    public function unset($key)
    {
        $this->offsetUnset($key);
    }

    /**
     * Alias of unshift
     *
     * @param  mixed $value
     * @param  mixed $key
     * @return $this
     */
    public function prepend($value, $key = null)
    {
        return $this->unshift($value, $key);
    }

    /**
     * Push an item onto the beginning of the collection.
     *
     * @param $value
     * @param null $key
     * @return $this
     */
    public function unshift($value, $key = null)
    {
        if (is_null($key)) {
            array_unshift($this->items, $value);
        } else {
            $this->items = [$key => $value] + $this->items;
        }

        return $this;
    }

    /**
     * Push one or more items onto the end of the collection.
     *
     * @param mixed $values [optional]
     * @return $this
     */
    public function push(...$values)
    {
        foreach ($values as $value) {
            $this->add($value);
        }

        return $this;
    }
}
