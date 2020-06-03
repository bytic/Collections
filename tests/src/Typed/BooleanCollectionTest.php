<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Typed\BooleanCollection;

/**
 * Class BooleanCollectionTest
 * @package Nip\Collections\Tests\Typed
 */
class BooleanCollectionTest extends AbstractTest
{
    use AbstractTypeTraitTest;

    /**
     * @return string
     */
    protected function typeClass()
    {
        return BooleanCollection::class;
    }

    protected function typeInvalidValues(): array
    {
        return ['string'];
    }

    protected function typeValidValues(): array
    {
        return [false];
    }
}
