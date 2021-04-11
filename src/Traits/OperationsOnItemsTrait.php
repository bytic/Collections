<?php

namespace Nip\Collections\Traits;

use Exception;

/**
 * Class OperationsOnItemsTrait
 * @package Nip\Collections\Traits
 */
trait OperationsOnItemsTrait
{

    /**
     * Execute a callback over each item.
     *
     * @param  callable  $callback
     * @return $this
     */
    public function each(callable $callback)
    {
        foreach ($this as $key => $item) {
            if ($callback($item, $key) === false) {
                break;
            }
        }

        return $this;
    }

    /**
     * @param $key
     * @param $value
     *
     * @throws Exception
     */
    public function valueAdd($key, $value)
    {
        if (!$this->has($key)) {
            $this->set($key, $value);

            return;
        }

        $currentValue = $this->get($key, 0);
        $currentValue = $currentValue === null ? 0 : $currentValue;

        if (!is_numeric($currentValue)) {
            throw new Exception("Current value for key {$key} is not numeric. [{$value}] provided. ");
        }

        $this->set($key, ($currentValue + $value));
    }

    /**
     * @param $key
     * @param $value
     *
     * @throws Exception
     */
    public function valueSubtract($key, $value)
    {
        $currentValue = $this->get($key, 0);

        if (!is_numeric($currentValue)) {
            throw new Exception("Current value for key {$key} is not numeric. [{$value}] provided. ");
        }

        $this->set($key, ($currentValue - $value));
    }
}
