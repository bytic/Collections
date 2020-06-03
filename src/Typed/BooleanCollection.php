<?php

namespace Nip\Collections\Typed;

/**
 * Class BooleanCollection
 * @package Nip\Collections\Typed
 */
class BooleanCollection extends AbstractTypedCollection
{
    CONST TYPE = 'bool';
    CONST CHECKER = 'is_bool';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}