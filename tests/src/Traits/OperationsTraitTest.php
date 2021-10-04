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

    public function testKeyByForArrayCollection()
    {
        $collection = new Collection();

        $collection['first'] = ['name' => 'John'];
        $collection['second'] = ['name' => 'Mike'];

        static::assertEquals(2, $collection->count());
        static::assertEquals(['first', 'second'], $collection->keys());

        $newCollection = $collection->keyBy('name');

        static::assertEquals(['first', 'second'], $collection->keys());
        static::assertEquals(['John', 'Mike'], $newCollection->keys());
    }


    public function test_groupByForArrayCollection()
    {
        $collection = new Collection();
        $collection[1] = ['name' => 'John', 'type' => 'user'];
        $collection[2] = ['name' => 'Mike', 'type' => 'user'];
        $collection[3] = ['name' => 'Mike', 'type' => 'admin'];

        $newCollection = $collection->groupBy('type');

        static::assertEquals(['user', 'admin'], $newCollection->keys());
        static::assertEquals(
            [
                ['name' => 'John', 'type' => 'user'],
                ['name' => 'Mike', 'type' => 'user']
            ],
            $newCollection->get('user')->toArray()
        );
        static::assertEquals(
            [['name' => 'Mike', 'type' => 'admin']],
            $newCollection->get('admin')->toArray()
        );
    }
}
