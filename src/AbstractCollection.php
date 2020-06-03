<?php

namespace Nip\Collections;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Nip\Collections\Legacy\Traits\DeprecatedTraits;

/**
 * Class Registry
 * @package Nip
 */
class AbstractCollection implements ArrayAccess, Countable, IteratorAggregate, JsonSerializable
{
    use Traits\AccessMethodsTrait;
    use Traits\ArrayAccessTrait;
    use Traits\FilterTrait;
    use Traits\OperationsOnItemsTrait;
    use Traits\OperationsTrait;
    use Traits\SortingTrait;
    use Traits\TransformMethodsTrait;
    use DeprecatedTraits;

    /**
     * @var array
     */
    protected $items = [];

    protected $index = 0;

    /**
     * Collection constructor.
     * @param array $items
     */
    public function __construct($items = [])
    {
        if (is_array($items)) {
            $this->items = $items;
        } elseif ($items instanceof AbstractCollection) {
            $this->items = $items->toArray();
        }
    }

    /**
     * @param $needle
     * @return bool
     */
    public function contains($needle)
    {
        foreach ($this as $key => $value) {
            if ($value === $needle) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
}
