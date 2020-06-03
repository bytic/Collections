<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Typed\CallableCollection;

/**
 * Class CallableCollectionTest
 * @package Nip\Collections\Tests\Typed
 */
class CallableCollectionTest extends AbstractTest
{
    use AbstractTypeTraitTest;

    /**
     * @return string
     */
    protected function typeClass()
    {
        return CallableCollection::class;
    }

    protected function typeInvalidValues(): array
    {
        return ['string'];
    }

    protected function typeValidValues(): array
    {
        return [
            (function () {
                return true;
            })
        ];
    }
}
