<?php

namespace Nip\Collections\Traits;

use Nip\Collections\AbstractCollection;

/**
 * Class OperationsTrait
 * @package Nip\Collections\Traits
 */
trait OperationsTrait
{
    /**
     * Returns the number of parameters.
     *
     * @return int The number of parameters
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Returns number of items in $collection.
     *
     * @return int
     */
    public function size(): int
    {
        $result = 0;
        foreach ($this as $value) {
            $result++;
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->count() < 1;
    }

    /**
     * @return bool
     */
    public function isNotEmpty(): bool
    {
        return !$this->isEmpty();
    }

    public function clear(): void
    {
        $this->rewind();
        $this->items = [];
    }

    /**
     * Key an associative array by a field or using a callback.
     *
     * @param callable|string $keyBy
     * @return static
     */
    public function keyBy($keyBy)
    {
        $results = [];
        foreach ($this->items as $key => $item) {
            $resolvedKey = is_object($item) ? $item->{$keyBy} : $item[$keyBy];
            $results[$resolvedKey] = $item;
        }
        return new static($results);
    }

    /**
     * Group an associative array by a field or using a callback.
     *
     * @param array|callable|string $groupBy
     * @param bool $preserveKeys
     * @return static
     */
    public function groupBy($groupBy, $preserveKeys = false): AbstractCollection
    {
        $results = [];

        $groupBy = $this->valueRetriever($groupBy);

        foreach ($this->items as $key => $value) {
            $groupKeys = $groupBy($value, $key);


            if (!is_array($groupKeys)) {
                $groupKeys = [$groupKeys];
            }

            foreach ($groupKeys as $groupKey) {
                $groupKey = is_bool($groupKey) ? (int)$groupKey : $groupKey;

                if (!array_key_exists($groupKey, $results)) {
                    $results[$groupKey] = new static;
                }

                $results[$groupKey]->offsetSet($preserveKeys ? $key : null, $value);
            }
        }

        $result = new static($results);

        return $result;
    }

    /**
     * @return void
     */
    abstract public function rewind();
}
