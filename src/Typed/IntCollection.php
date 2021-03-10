<?php

namespace Nip\Collections\Typed;

/**
 * Class IntCollection
 * @package Nip\Collections\Typed
 */
class IntCollection extends AbstractTypedCollection
{
    public const TYPE = 'int';
    public const CHECKER = 'is_int';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}
