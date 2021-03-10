<?php

namespace Nip\Collections\Tests;

use Mockery as m;
use Nip\Collections\Collection;
use Nip\Collections\Tests\Fixtures\LazyCollection;
use PHPUnit\Framework\TestCase;

/**c
 * Class AbstractTest
 */
abstract class AbstractTest extends TestCase
{
    protected $object;


    /**
     * Provides each collection class, respectively.
     *
     * @return array
     */
    public function collectionClassProvider()
    {
        return [
            [Collection::class],
            [LazyCollection::class],
        ];
    }

    public function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }
}
