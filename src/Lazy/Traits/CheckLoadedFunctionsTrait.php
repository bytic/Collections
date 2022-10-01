<?php

namespace Nip\Collections\Lazy\Traits;

use Nip\Collections\CollectionInterface;

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
    public function offsetSet($key, $value): void
    {
        $this->load();
        parent::offsetSet($key, $value);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($key) : mixed
    {
        $this->load();
        return parent::offsetGet($key);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($key): bool
    {
        $this->load();
        return parent::offsetExists($key);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($key): void
    {
        $this->load();
        parent::offsetUnset($key);
    }

    /**
     * @inheritDoc
     */
    public function filter(callable $callback = null): CollectionInterface
    {
        $this->load();
        return parent::filter($callback);
    }


    /**
     * @inheritDoc
     */
    public function count(): int
    {
        $this->load();
        return parent::count();
    }
}
