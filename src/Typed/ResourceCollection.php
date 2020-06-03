<?php

namespace Nip\Collections\Typed;

/**
 * Class IntCollection
 * @package Nip\Collections\Typed
 */
class ResourceCollection extends AbstractTypedCollection
{
    const TYPE = 'resource';
    const CHECKER = 'is_resource';

    protected $type = self::TYPE;
    protected $typeChecker = self::CHECKER;
}