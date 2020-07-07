<?php

namespace Nip\Collections\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;

/**c
 * Class AbstractTest
 */
abstract class AbstractTest extends TestCase
{
    protected $object;

    public function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }
}
