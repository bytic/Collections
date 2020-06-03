<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Typed\NumberCollection;

/**
 * Class NumberCollectionTest
 * @package Nip\Collections\Tests\Typed
 */
class NumberCollectionTest extends AbstractTest
{
    use AbstractTypeTraitTest;

    /**
     * @return string
     */
    protected function typeClass()
    {
        return NumberCollection::class;
    }

    protected function typeInvalidValues(): array
    {
        return ['10t','test'];
    }

    protected function typeValidValues(): array
    {
        return [10, 10.11,'10','10.22'];
    }
}
