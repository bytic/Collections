<?php

namespace Nip\Collections\Typed;

/**
 * Class IntCollection
 * @package Nip\Collections\Typed
 */
class ObjectCollection  extends AbstractTypedCollection
{
    CONST TYPE = 'object';
    CONST CHECKER = 'is_object';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}