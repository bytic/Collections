<?php

namespace Nip\Collections\Lazy;

use Nip\Collections\AbstractCollection;

/**
 * Class AbstractLazyCollection
 * @package Nip\Collections\Lazy
 */
abstract class AbstractLazyCollection extends AbstractCollection
{
    use Traits\IsLazyLoadedTrait;
    use Traits\CheckLoadedFunctionsTrait;
}