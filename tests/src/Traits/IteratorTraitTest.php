<?php

namespace Nip\Collections\Tests\Traits;

use Nip\Collections\Tests\Fixtures\IteratorCollection;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class IteratorTraitTest extends TestCase
{
    public function test_current()
    {
        $iterator = new IteratorCollection();
        $iterator['a'] = 1;
        $iterator['b'] = 2;
        self::assertSame(1, $iterator->current());
        self::assertSame('a', $iterator->key());
    }
}
