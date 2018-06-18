<?php

namespace Nip\Collections\Tests\Traits;

use Nip\Collections\Collection;
use Nip\Collections\Tests\AbstractTest;
use stdClass;

/**
 * Class OperationsTraitTest
 * @package Nip\Collections\Tests\Traits
 */
class OperationsTraitTest extends AbstractTest
{
    /**
     * @var Collection
     */
    protected $collection;

    public function testClear()
    {
        $this->collection = new Collection();

        static::assertEquals(0, $this->collection->count());

        $this->collection['first'] = new stdClass();
        static::assertEquals(1, $this->collection->count());

        $this->collection['luke'] = 'Luke Skywalker';
        static::assertEquals('Luke Skywalker', $this->collection['luke']);

        static::assertEquals(2, $this->collection->count());

        $this->collection->clear();
        static::assertEquals(0, $this->collection->count());
    }
}
