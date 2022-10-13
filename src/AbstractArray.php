<?php

namespace Nip\Collections;

use ArrayIterator;
use JsonSerializable;
use Nip\Collections\Legacy\Traits\DeprecatedTraits;
use Traversable;

/**
 * Class Registry
 * @package Nip
 */
abstract class AbstractArray  implements ArrayInterface
{
    use Traits\AccessMethodsTrait;
    use Traits\ArrayAccessTrait;
    use Traits\EnumeratesValues;
    use Traits\FilterTrait;
    use Traits\OperationsOnItemsTrait;
    use Traits\OperationsTrait;
    use Traits\SortingTrait;
    use Traits\TransformMethodsTrait;
    use DeprecatedTraits;

    /**
     * The items of this array.
     *
     * @var array<array-key, T>
     */
    protected $data = [];


    /**
     * Constructs a new array object.
     *
     * @param array<array-key, T> $data The initial items to add to this array.
     */
    public function __construct(array $data = [])
    {
        // Invoke offsetSet() for each value added; in this way, sub-classes
        // may provide additional logic about values added to the array object.
        foreach ($data as $key => $value) {
            $this[$key] = $value;
        }
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator() : Traversable
    {
        return new ArrayIterator($this->data);
    }
}
