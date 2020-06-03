<?php

namespace Nip\Collections\Tests\Traits;

use Nip\Collections\Collection;
use Nip\Collections\Tests\AbstractTest;
use Nip\Utility\Arr;

/**
 * Class AccessMethodsTraitTest
 * @package Nip\Collections\Tests\Traits
 */
class AccessMethodsTraitTest extends AbstractTest
{
    public function test_unshift()
    {
        $collection = new Collection();

        $collection->unshift(1);
        self::assertSame(1, $collection->first());

        $collection->unshift(2);
        self::assertSame(2, $collection->first());

        $collection->unshift(3,99);
        self::assertSame(3, $collection->first());
        self::assertSame(99, Arr::first($collection->keys()));
    }
}