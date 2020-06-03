<?php

namespace Nip\Collections\Tests\Typed;

use Nip\Collections\Exceptions\InvalidTypeException;
use Nip\Collections\Typed\AbstractTypedCollection;

/**
 * Trait AbstractTypeTraitTest
 * @package Nip\Collections\Tests\Typed
 */
trait AbstractTypeTraitTest
{
    /**
     * @dataProvider data_invalidValues
     * @param $value
     */
    public function test_add_invalidValues($value)
    {
        $collection = $this->newCollection();
        $exceptions = 0;

        try {
            $collection->add($value);
        } catch (InvalidTypeException $exception) {$exceptions++;}
        try {
            $collection->set(1, $value);
        } catch (InvalidTypeException $exception) {$exceptions++;}
        try {
            $collection[] = $value;
        } catch (InvalidTypeException $exception) {$exceptions++;}
        try {
            $collection[1] = $value;
        } catch (InvalidTypeException $exception) {$exceptions++;}
        try {
            $collection->unshift($value);
        } catch (InvalidTypeException $exception) {$exceptions++;}
        try {
            $collection->unshift($value, 3);
        } catch (InvalidTypeException $exception) {$exceptions++;}
        try {
            $collection->push($value);
        } catch (InvalidTypeException $exception) {$exceptions++;}

        self::assertSame(7, $exceptions);
        self::assertSame(0, $collection->count());
    }

    /**
     * @dataProvider data_validValues
     * @param $value
     */
    public function test_add_validValues($value)
    {
        $collection = $this->newCollection();

        $collection->add($value);
        $collection->set(1, $value);
        $collection[] = $value;
        $collection[9] = $value;
        $collection->unshift($value);
        $collection->push($value);

        self::assertCount(6, $collection);
    }

    /**
     * @return array
     */
    public function data_invalidValues()
    {
        $return = [];
        foreach ($this->typeInvalidValues() as $value) {
            $return[] = [$value];
        }
        return $return;
    }

    /**
     * @return array
     */
    public function data_validValues()
    {
        $return = [];
        foreach ($this->typeValidValues() as $value) {
            $return[] = [$value];
        }
        return $return;
    }

    protected function newCollection(): AbstractTypedCollection
    {
        $type = $this->typeClass();
        $collection = new $type();
        return $collection;
    }

    abstract protected function typeClass();

    abstract protected function typeInvalidValues(): array;

    abstract protected function typeValidValues(): array;
}
