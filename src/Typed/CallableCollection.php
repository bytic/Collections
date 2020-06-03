<?php

namespace Nip\Collections\Typed;

/**
 * Class CallableCollection
 * @package Nip\Collections\Typed
 */
class CallableCollection  extends AbstractTypedCollection
{
    CONST TYPE = 'callable';
    CONST CHECKER = 'is_callable';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}