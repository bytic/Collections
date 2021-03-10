<?php

namespace Nip\Collections\Typed;

/**
 * Class ClassCollection
 * @package Nip\Collections\Typed
 */
class ClassCollection extends AbstractTypedCollection
{
    public const TYPE = 'class';

    protected $type = self::TYPE;
    protected $validClass = null;

    /**
     * ClassCollection constructor.
     * @param array $items
     */
    public function __construct($items = [])
    {
        $this->typeChecker = function ($element) {
            return ($element instanceof $this->validClass);
        };
        parent::__construct($items);
    }


    /**
     * @param null $validClass
     */
    public function validClass($validClass): void
    {
        $this->validClass = $validClass;
    }
}
