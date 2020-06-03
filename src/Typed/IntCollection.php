<?php

namespace Nip\Collections\Typed;

/**
 * Class IntCollection
 * @package Nip\Collections\Typed
 */
class IntCollection extends AbstractTypedCollection
{
    CONST TYPE = 'int';
    CONST CHECKER = 'is_int';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}