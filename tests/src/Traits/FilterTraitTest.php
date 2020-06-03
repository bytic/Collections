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
