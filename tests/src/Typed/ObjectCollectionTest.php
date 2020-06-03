<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Typed\ObjectCollection;

/**
 * Class ObjectCollectionTest
 * @package Nip\Collections\Tests\Typed
 */
class ObjectCollectionTest extends AbstractTest
{
    use AbstractTypeTraitTest;

    /**
     * @return string
     */
    protected function typeClass()
    {
        return ObjectCollection::class;
    }

    protected function typeInvalidValues(): array
    {
        return ['10'];
    }

    protected function typeValidValues(): array
    {
        return [new \stdClass()];
    }
}
