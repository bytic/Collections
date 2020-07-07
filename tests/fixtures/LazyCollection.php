<?php

namespace Nip\Collections\Tests\Fixtures;

use Nip\Collections\Lazy\AbstractLazyCollection;

/**
 * Class LazyCollection
 * @package Nip\Collections\Tests\Fixtures
 */
class LazyCollection extends AbstractLazyCollection
{

    protected function doLoad(): void
    {
        $this[] = 1;
        $this->set(2, 2);
    }
}
