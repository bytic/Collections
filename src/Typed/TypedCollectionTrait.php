<?php

namespace Nip\Collections\Typed;

use Nip\Collections\Exceptions\InvalidTypeException;
use TypeError;

/**
 * Trait AbstractTypedCollectionTrait
 * @package Nip\Collections\Typed
 */
trait TypedCollectionTrait
{
    protected $type;
    protected $typeChecker;

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->validateItem($value);
        parent::offsetSet($offset, $value);
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        if (is_string($type)) {
            $this->type = $type;
            switch (strtolower($type)) {
                case 'string':
                case 'text':
                    $this->type = StringCollection::TYPE;
                    $this->typeChecker = StringCollection::CHECKER;
                    break;
                case 'double':
                case 'float':
                    $this->type = FloatCollection::TYPE;
                    $this->typeChecker = FloatCollection::CHECKER;
                    break;
                case 'array':
                    $this->type = ArrayCollection::TYPE;
                    $this->typeChecker = ArrayCollection::CHECKER;
                    break;
                case 'resource':
                case 'resource (closed)':
                    $this->type = ResourceCollection::TYPE;
                    $this->typeChecker = ResourceCollection::CHECKER;
                    break;
                case 'integer':
                case 'int':
                    $this->type = IntCollection::TYPE;
                    $this->typeChecker = IntCollection::CHECKER;
                    break;
                case 'number':
                    $this->type = NumberCollection::TYPE;
                    $this->typeChecker = NumberCollection::CHECKER;
                    break;
                case 'object':
                    $this->type = ObjectCollection::TYPE;
                    $this->typeChecker = ObjectCollection::CHECKER;
                    break;
                case 'callable':
                case 'closure':
                case 'callback':
                case 'function':
                    $this->type = CallableCollection::TYPE;
                    $this->typeChecker = CallableCollection::CHECKER;
                    break;
                case 'boolean':
                case 'bool':
                    $this->type = BooleanCollection::TYPE;
                    $this->typeChecker = BooleanCollection::CHECKER;
                    break;
                case 'json':
                    $this->typeChecker = function ($element) {
                        if (!is_string($element)) {
                            return false;
                        }
                        if (strcasecmp($element, 'null') == 0) {
                            return true;
                        }
                        return (json_decode($element) !== null);
                    };
                    break;
                default:
                    // Class name
                    $this->type = $type;
                    $this->typeChecker = function ($element) use ($type) {
                        return ($element instanceof $type);
                    };
            }
        } elseif (is_callable($type)) {
            $this->typeChecker = $type;
        } else {
            throw new TypeError('Invalid criteria to check elements of the collection.');
        }
    }

    /**
     * @param $sample
     */
    public function setTypeLike($sample)
    {
        if ($sample === null) {
            throw new \InvalidArgumentException('Sample element cannot be NULL');
        } elseif (is_object($sample)) {
            $this->setType(get_class($sample));
            return;
        }
        $this->setType(gettype($sample));
    }

    protected function validateItems(array $array): void
    {
        foreach ($array as $value) {
            $this->validateItem($value);
        }
    }

    /**
     * @param $value
     */
    protected function validateItem($value): void
    {
        if (!$this->validItem($value)) {
            $message = $this->getErrorMessage($value) ?? "%s not valid type. Expected [%s] for %s collection!";

            $valueType = gettype($value);

            if ($valueType === 'object') {
                $valueType = get_class($value);
            }

            $message = sprintf(
                $message,
                $valueType,
                $this->type,
                get_called_class()
            );


            throw new InvalidTypeException(
                $message
            );
        }
    }

    /**
     * Is the item valid - overwrite if you need another check
     *
     * @param $item
     * @return bool
     */
    protected function validItem($item): bool
    {
        return ($this->typeChecker)($item);
    }

    /**
     * @param $value
     * @return string|null
     */
    protected function getErrorMessage($value): ?string
    {
        return null;
    }
}
