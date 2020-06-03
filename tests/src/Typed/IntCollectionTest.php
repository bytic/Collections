<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Typed\IntCollection;

/**
 * Class IntCollectionTest
 * @package Nip\Collections\Tests\Typed
 */
class IntCollectionTest extends AbstractTest
{
    use AbstractTypeTraitTest;

    /**
     * @return string
     */
    protected function typeClass()
    {
        return IntCollection::class;
    }

    protected function typeInvalidValues(): array
    {
        return ['10', 10.00];
    }

    protected function typeValidValues(): array
    {
        return [10];
    }
}
