<?php

namespace Nip\Collections\Tests\Fixtures;

use Nip\Collections\Traits\ArrayAccessTrait;
use Nip\Collections\Traits\SortingTrait;

/**
 * Class IteratorCollection
 * @package Nip\Collections\Tests\Fixtures
 */
class IteratorCollection implements \Iterator, \ArrayAccess
{
    use SortingTrait;
    use ArrayAccessTrait;

    /**
     * @var array
     */
    protected $items = [];

}
