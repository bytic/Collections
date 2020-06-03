<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Typed\StringCollection;

/**
 * Class StringCollectionTest
 * @package Nip\Collections\Tests\Typed
 */
class StringCollectionTest extends AbstractTest
{
    use AbstractTypeTraitTest;

    /**
     * @return string
     */
    protected function typeClass()
    {
        return StringCollection::class;
    }

    protected function typeInvalidValues(): array
    {
        return [false];
    }

    protected function typeValidValues(): array
    {
        return ['test'];
    }
}
