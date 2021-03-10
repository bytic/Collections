<?php

namespace Nip\Collections\Typed;

/**
 * Class IntCollection
 * @package Nip\Collections\Typed
 */
class ResourceCollection extends AbstractTypedCollection
{
    public const TYPE = 'resource';
    public const CHECKER = 'is_resource';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}
