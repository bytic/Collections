<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Typed\ArrayCollection;

/**
 * Class ArrayCollectionTest
 * @package Nip\Collections\Tests\Typed
 */
class ArrayCollectionTest extends AbstractTest
{
    use AbstractTypeTraitTest;

    /**
     * @return string
     */
    protected function typeClass()
    {
        return ArrayCollection::class;
    }

    protected function typeInvalidValues(): array
    {
        return ['string'];
    }

    protected function typeValidValues(): array
    {
        return [['test']];
    }
}
