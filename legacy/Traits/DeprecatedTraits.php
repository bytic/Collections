<?php

namespace Nip\Collections\Legacy\Traits;

/**
 * Trait DeprecatedTraits
 * @package Nip\Collections\Legacy\Traits
 */
trait DeprecatedTraits
{
    /**
     * @param $key
     * @return bool
     * @deprecated Use ->has($key) instead
     */
    public function exists($key)
    {
        return $this->has($key);
    }
}
