<?php

namespace Nip\Collections\Typed;

/**
 * Class BooleanCollection
 * @package Nip\Collections\Typed
 */
class BooleanCollection extends AbstractTypedCollection
{
    public const TYPE = 'bool';
    public const CHECKER = 'is_bool';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}
