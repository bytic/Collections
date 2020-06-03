<?php

namespace Nip\Collections\Typed;

/**
 * Class StringCollection
 * @package Nip\Collections\Typed
 */
class StringCollection extends AbstractTypedCollection
{
    CONST TYPE = 'string';
    CONST CHECKER = 'is_string';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}