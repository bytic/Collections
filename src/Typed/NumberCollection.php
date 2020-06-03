<?php

namespace Nip\Collections\Typed;

/**
 * Class IntCollection
 * @package Nip\Collections\Typed
 */
class NumberCollection extends AbstractTypedCollection
{
    CONST TYPE = 'number';
    CONST CHECKER = 'is_numeric';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}