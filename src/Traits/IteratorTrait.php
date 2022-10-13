<?php

namespace Nip\Collections\Traits;

/**
 *
 */
trait IteratorTrait
{
    protected int $index = 0;

    /**
     * @return mixed
     */
    public function rewind()
    {
        $this->index = 0;

        return reset($this->items);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->items);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        $this->index++;
        return next($this->items);
    }

    /**
     * @return mixed
     */
    public function end()
    {
        $this->index = count($this->items);
        return end($this->items);
    }


    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return int|TKey|string|null
     */
    public function key()
    {
        return key($this->items);
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return bool The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid(): bool
    {
        return (current($this->items) !== false);
    }
}