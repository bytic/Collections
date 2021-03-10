<?php

namespace Nip\Collections\Typed;

/**
 * Class StringCollection
 * @package Nip\Collections\Typed
 */
class StringCollection extends AbstractTypedCollection
{
    public const TYPE = 'string';
    public const CHECKER = 'is_string';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}
