<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Tests\Fixtures\BaseClassCollection;
use Nip\Collections\Tests\Fixtures\BaseObject;
use Nip\Utility\Number;
use function PHPUnit\Framework\assertEquals;

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
     * @dataProvider data_validValues
     * @param $value
     */
    public function test_serialize($value)
    {
        $collection = $this->newCollection();

        $collection->add($value);
        $collection->set(1, $value);
        $collection[] = $value;
        $collection[9] = $value;
        $collection->unshift($value);
        $collection->push($value);

        $serialized = serialize($collection);
        $collectionReturn = unserialize($serialized);
        assertEquals($collection->all(), $collectionReturn->all());
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
        return BaseClassCollection::class;
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
