<?php

namespace Nip\Collections\Tests\Lazy;

use Nip\Collections\Tests\AbstractTest;
use Nip\Collections\Tests\Fixtures\LazyCollection;

/**
 * Class AbstractLazyCollectionTest
 * @package Nip\Collections\Tests\Lazy
 */
class AbstractLazyCollectionTest extends AbstractTest
{
    public function test_lazy()
    {
        $mock = \Mockery::mock(LazyCollection::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $mock->shouldReceive('doLoad')->never();

        self::assertInstanceOf(LazyCollection::class, $mock);
//        self::assertSame(0, $mock->count());
    }

    public function test_doLoad_once()
    {
        $mock = \Mockery::mock(LazyCollection::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $mock->shouldReceive('doLoad')->once();

        self::assertInstanceOf(LazyCollection::class, $mock);
        self::assertSame(0, $mock->count());
        self::assertSame(0, $mock->count());
        self::assertSame(0, $mock->count());
        self::assertSame(0, $mock->count());
    }

    public function test_doLoad()
    {
        $collection = new LazyCollection();
        self::assertInstanceOf(LazyCollection::class, $collection);
        self::assertSame(2, $collection->count());
    }
}
