<?php

/**
 * @inspiration https://github.com/ramsey/collection/blob/main/src/ArrayInterface.php
 */

declare(strict_types=1);

namespace Nip\Collections;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use Serializable;

/**
 * `ArrayInterface` provides traversable array functionality to data types.
 *
 * @template T
 */
interface ArrayInterface extends
    ArrayAccess,
    Countable,
    IteratorAggregate,
    Serializable
{
    /**
     * Removes all items from this array.
     */
    public function clear(): void;

    /**
     * Returns a native PHP array representation of this array object.
     *
     * @return array<array-key, T>
     */
    public function toArray(): array;

    /**
     * Returns `true` if this array is empty.
     */
    public function isEmpty(): bool;
}
