<?php

namespace Nip\Collections\Tests\Traits;

use Nip\Collections\Collection;
use Nip\Collections\Tests\AbstractTest;

/**
 * Class OperationsOnItemsTraitTest
 * @package Nip\Collections\Tests\Traits
 */
class OperationsOnItemsTraitTest extends AbstractTest
{
    public function test_valueAdd_numeric()
    {
        $collection = new Collection();

        $collection->valueAdd('foe', 1);
        self::assertSame(1, $collection->get('foe'));

        $collection->valueAdd('foe', 2);
        self::assertSame(3, $collection->get('foe'));

        $collection->valueAdd('foe', 2);
        self::assertSame(5, $collection->get('foe'));
    }

    public function test_valueSubstrat_numeric()
    {
        $collection = new Collection();

        $collection->valueSubstract('foe', 1);
        self::assertSame(-1, $collection->get('foe'));

        $collection->set('foe', 5);
        $collection->valueSubstract('foe', 2);
        self::assertSame(3, $collection->get('foe'));
    }
}