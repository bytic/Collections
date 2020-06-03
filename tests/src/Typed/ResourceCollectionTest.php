<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Typed\ResourceCollection;

/**
 * Class ResourceCollectionTest
 * @package Nip\Collections\Tests\Typed
 */
class ResourceCollectionTest extends AbstractTest
{
    use AbstractTypeTraitTest;

    /**
     * @return string
     */
    protected function typeClass()
    {
        return ResourceCollection::class;
    }

    protected function typeInvalidValues(): array
    {
        return ['10'];
    }

    protected function typeValidValues(): array
    {
        return [fopen('php://stdout', 'w')];
    }
}
