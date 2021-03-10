<?php

namespace Nip\Collections\Typed;

/**
 * Class FloatCollection
 * @package Nip\Collections\Typed
 */
class FloatCollection extends AbstractTypedCollection
{
    public const TYPE = 'float';
    public const CHECKER = 'is_float';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}
