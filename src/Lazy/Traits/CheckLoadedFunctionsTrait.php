<?php

namespace Nip\Collections\Lazy\Traits;

/**
 * Trait CheckLoadedFunctionsTrait
 * @package Nip\Collections\Lazy\Traits
 * @internal
 */
trait CheckLoadedFunctionsTrait
{
    /**
     * @inheritDoc
     */
    public function offsetSet($key, $value)
    {
        $this->load();
        return parent::offsetSet($key, $value);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($key)
    {
        $this->load();
        return parent::offsetGet($key);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($key)
    {
        $this->load();
        return parent::offsetExists($key);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($key)
    {
        $this->load();
        return parent::offsetUnset($key);
    }

    /**
     * @inheritDoc
     */
    public function filter(callable $callback = null)
    {
        $this->load();
        return parent::filter($callback);
    }


    /**
     * @inheritDoc
     */
    public function count()
    {
        $this->load();
        return parent::count();
    }
}