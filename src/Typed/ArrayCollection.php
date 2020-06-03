<?php

namespace Nip\Collections\Typed;

/**
 * Class ArrayCollection
 * @package Nip\Collections\Typed
 */
class ArrayCollection extends AbstractTypedCollection
{
    const TYPE = 'array';
    const CHECKER = 'is_array';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}
