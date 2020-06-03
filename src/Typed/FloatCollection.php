<?php

namespace Nip\Collections\Typed;

/**
 * Class FloatCollection
 * @package Nip\Collections\Typed
 */
class FloatCollection extends AbstractTypedCollection
{
    const TYPE = 'float';
    const CHECKER = 'is_float';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}
