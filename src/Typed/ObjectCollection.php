<?php

namespace Nip\Collections\Typed;

/**
 * Class IntCollection
 * @package Nip\Collections\Typed
 */
class ObjectCollection extends AbstractTypedCollection
{
    public const TYPE = 'object';
    public const CHECKER = 'is_object';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}
