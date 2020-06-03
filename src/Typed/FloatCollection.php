<?php

namespace Nip\Collections\Typed;

/**
 * Class FloatCollection
 * @package Nip\Collections\Typed
 */
class FloatCollection extends AbstractTypedCollection
{
    CONST TYPE = 'float';
    CONST CHECKER = 'is_float';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}
