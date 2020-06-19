<?php

namespace Nip\Collections\Tests\Traits;

use Nip\Collections\Collection;
use Nip\Collections\Tests\AbstractTest;

/**
 * Class FilterTraitTest
 * @package Nip\Collections\Tests\Traits
 */
class FilterTraitTest extends AbstractTest
{

    public function testFilter()
    {
        $collection = new Collection([['id' => 1, 'name' => 'Hello'], ['id' => 2, 'name' => 'World']]);
        static::assertEquals([1 => ['id' => 2, 'name' => 'World']], $collection->filter(function ($item) {
            return $item['id'] == 2;
        })->all());

        $collection = new Collection(['', 'Hello', '', 'World']);
        static::assertEquals(['Hello', 'World'], $collection->filter()->values());

        $collection = new Collection(['id' => 1, 'first' => 'Hello', 'second' => 'World']);
        static::assertEquals(['first' => 'Hello', 'second' => 'World'], $collection->filter(function ($item, $key) {
            return $key != 'id';
        })->all());
    }

    public function test_only()
    {
        $data = new Collection(['first' => 'John', 'last' => 'Smith', 'email' => 'my@gmail.com']);

        static::assertEquals($data->all(), $data->only(null)->all());

        static::assertEquals(['first' => 'John'], $data->only(['first', 'missing'])->all());
        static::assertEquals(['first' => 'John'], $data->only('first', 'missing')->all());

        static::assertEquals(['first' => 'John', 'email' => 'my@gmail.com'], $data->only(['first', 'email'])->all());
        static::assertEquals(['first' => 'John', 'email' => 'my@gmail.com'], $data->only('first', 'email')->all());
    }

    public function test_splice()
    {
        $data = new Collection(['first' => 'John', 'last' => 'Smith', 'email' => 'my@gmail.com']);

        $dataSpliced = $data->splice(0, 1);
        static::assertInstanceOf(Collection::class, $dataSpliced);
        self::assertSame(['first' => 'John'], $dataSpliced->all());
    }
}
