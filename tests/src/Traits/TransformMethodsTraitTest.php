<?php

namespace Nip\Collections\Tests\Traits;

use Nip\Collections\Collection;
use Nip\Collections\Tests\AbstractTest;
use Nip\Utility\Str;

/**
 * Class TransformMethodsTraitTest
 * @package Nip\Collections\Tests\Traits
 */
class TransformMethodsTraitTest extends AbstractTest
{
    /**
     * @dataProvider collectionClassProvider
     */
    public function testImplode($collection)
    {
        $data = new $collection([['name' => 'taylor', 'email' => 'foo'], ['name' => 'dayle', 'email' => 'bar']]);
        $this->assertSame('foobar', $data->implode('email'));
        $this->assertSame('foo,bar', $data->implode('email', ','));

        $data = new $collection(['taylor', 'dayle']);
        $this->assertSame('taylordayle', $data->implode(''));
        $this->assertSame('taylor,dayle', $data->implode(','));
    }

    public function test_transform()
    {
        $data = new Collection(['first' => 'john', 'last' => 'doe']);
        $data->transform(function ($item, $key) {
            return $key . '-' . strrev($item);
        });
        static::assertEquals(['first' => 'first-nhoj', 'last' => 'last-eod'], $data->all());
    }
}
