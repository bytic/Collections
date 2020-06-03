<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Typed\FloatCollection;

/**
 * Class FloatCollectionTest
 * @package Nip\Collections\Tests\Typed
 */
class FloatCollectionTest extends AbstractTest
{
    use AbstractTypeTraitTest;

    /**
     * @return string
     */
    protected function typeClass()
    {
        return FloatCollection::class;
    }

    protected function typeInvalidValues(): array
    {
        return ['string'];
    }

    protected function typeValidValues(): array
    {
        return [10.11];
    }
}
