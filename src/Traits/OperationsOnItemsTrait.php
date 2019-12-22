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

        $currentValue = $this->get($key);
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
    public function valueSubstract($key, $value)
    {
        $currentValue = $this->get($key, 0);

        if (!is_numeric($currentValue)) {
            throw new Exception("Current value for key {$key} is not numeric. [{$value}] provided. ");
        }

        $this->set($key, ($currentValue - $value));
    }
}