<?php

namespace Nip\Collections\Typed;

/**
 * Class IntCollection
 * @package Nip\Collections\Typed
 */
class NumberCollection extends AbstractTypedCollection
{
    const TYPE = 'number';
    const CHECKER = 'is_numeric';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}
