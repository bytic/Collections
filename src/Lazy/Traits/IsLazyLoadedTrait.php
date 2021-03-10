<?php

namespace Nip\Collections\Lazy\Traits;

/**
 * Trait IsLazyLoadedTrait
 * @package Nip\Collections\Lazy\Traits
 * @internal
 */
trait IsLazyLoadedTrait
{
    /** @var bool */
    protected $loaded = false;

    /**
     * Is the lazy collection already initialized?
     */
    public function isLoaded(): bool
    {
        return $this->loaded;
    }

    /**
     * Initialize the collection
     */
    protected function load(): void
    {
        if ($this->loaded) {
            return;
        }

        $this->loaded = true;
        $this->doLoad();
    }

    /**
     * Do the initialization logic
     */
    abstract protected function doLoad(): void;
}
