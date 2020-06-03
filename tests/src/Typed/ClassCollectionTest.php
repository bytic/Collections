<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Tests\Fixtures\BaseObject;
use Nip\Collections\Typed\ClassCollection;
use Nip\Utility\Number;

/**
 * Class ClassCollectionTest
 * @package Nip\Collections\Tests\Typed
 */
class ClassCollectionTest extends AbstractTest
{
    use AbstractTypeTraitTest {
        newCollection as newCollectionTrait;
    }

    /**
     * @return \Nip\Collections\Typed\AbstractTypedCollection
     */
    protected function newCollection()
    {
        $collection = $this->newCollectionTrait();
        $collection->validClass(BaseObject::class);
        return $collection;
    }

    /**
     * @return string
     */
    protected function typeClass()
    {
        return ClassCollection::class;
    }

    protected function typeInvalidValues(): array
    {
        return ['string', new \stdClass(), new Number()];
    }

    protected function typeValidValues(): array
    {
        return [new BaseObject()];
    }
}
