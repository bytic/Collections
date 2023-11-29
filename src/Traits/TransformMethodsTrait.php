<?php

namespace Nip\Collections\Traits;

use JsonSerializable;
use Nip\Collections\AbstractArray;
use Nip\Collections\AbstractCollection;
use Nip\Collections\ArrayInterface;
use Nip\Utility\Arr;

/**
 * Class TransformMethodsTrait
 * @package Nip\Collections\Traits
 */
trait TransformMethodsTrait
{
    protected $serializable = ['items'];

    /**
     * Get the values of a given key.
     *
     * @param string|array|int|null $value
     * @param string|null $key
     * @return static
     */
    public function pluck($value, $key = null)
    {
        return new static(Arr::pluck($this->items, $value, $key));
    }

    /**
     * Run a map over each of the items.
     *
     * @param callable $callback
     * @return static
     */
    public function map(callable $callback)
    {
        $keys = array_keys($this->items);

        $items = array_map($callback, $this->items, $keys);

        return new static(array_combine($keys, $items));
    }

    /**
     * Run a dictionary map over the items.
     *
     * The callback should return an associative array with a single key/value pair.
     *
     * @param callable $callback
     * @return static
     */
    public function mapToDictionary(callable $callback)
    {
        $dictionary = [];

        foreach ($this->items as $key => $item) {
            $pair = $callback($item, $key);

            $key = key($pair);

            $value = reset($pair);

            if (!isset($dictionary[$key])) {
                $dictionary[$key] = [];
            }

            $dictionary[$key][] = $value;
        }

        return new static($dictionary);
    }

    /**
     * Run an associative map over each of the items.
     *
     * The callback should return an associative array with a single key/value pair.
     *
     * @param callable $callback
     * @return static
     */
    public function mapWithKeys(callable $callback)
    {
        $result = [];

        foreach ($this->items as $key => $value) {
            $assoc = $callback($value, $key);

            foreach ($assoc as $mapKey => $mapValue) {
                $result[$mapKey] = $mapValue;
            }
        }

        return new static($result);
    }

    /**
     * Concatenate values of a given key as a string.
     *
     * @param string $value
     * @param string|null $glue
     * @return string
     */
    public function implode($value, $glue = null)
    {
        $first = $this->first();

        if (is_array($first) || is_object($first)) {
            return implode($glue, $this->pluck($value)->all());
        }

        return implode($value, $this->items);
    }

    /**
     * Transform each item in the collection using a callback.
     *
     * @param callable $callback
     * @return $this
     */
    public function transform(callable $callback)
    {
        $this->items = $this->map($callback)->all();

        return $this;
    }

    /**
     * @param $preserve_keys
     * @return TransformMethodsTrait|AbstractArray|AbstractCollection
     */
    public function reverse($preserve_keys = false): self
    {
        return new static(array_reverse($this->items, $preserve_keys));
    }

    /**
     * Reduce the collection to a single value.
     *
     * @param callable $callback
     * @param mixed $initial
     * @return mixed
     */
    public function reduce(callable $callback, $initial = null)
    {
        $result = $initial;

        foreach ($this as $key => $value) {
            $result = $callback($result, $value, $key);
        }

        return $result;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_map(function ($value) {
            return $value instanceof ArrayInterface ? $value->toArray() : $value;
        }, $this->items);
    }

    /**
     * Returns a serialized string representation of this array object.
     *
     * @link http://php.net/manual/en/serializable.serialize.php Serializable::serialize()
     *
     * @return string a PHP serialized string.
     */
    public function serialize(): string
    {
        $properties = $this->__sleep();
        $data = [];
        foreach ($properties as $property) {
            $data[$property] = $this->{$property};
        }
        return serialize($data);
    }

    /**
     * @return array
     */
    public function __serialize(): array
    {
        $properties = $this->__sleep();
        $data = [];
        foreach ($properties as $property) {
            $data[$property] = $this->{$property};
        }
        return $data;
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return $this->serializable;
    }

    /**
     * @param $data
     * @return void
     */
    public function __unserialize($data): void
    {
        foreach ($data as $property => $value) {
            $this->{$property} = $value;
        }
    }

    /**
     * Converts a serialized string representation into an instance object.
     *
     * @link http://php.net/manual/en/serializable.unserialize.php Serializable::unserialize()
     *
     * @param string $serialized A PHP serialized string to unserialize.
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     */
    public function unserialize($serialized): void
    {
        /** @var array<array-key, T> $data */
        $data = unserialize($serialized, ['allowed_classes' => $this->unserializeAllowedClasses()]);
        if (!is_array($data)) {
            return;
        }
        foreach ($data as $property => $value) {
            $this->{$property} = $value;
        }
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize(): mixed
    {
        return array_map(function ($value) {
            if ($value instanceof JsonSerializable) {
                return $value->jsonSerialize();
            } else {
                return $value;
            }
        }, $this->items);
    }

    protected function unserializeAllowedClasses()
    {
        return false;
    }
}
