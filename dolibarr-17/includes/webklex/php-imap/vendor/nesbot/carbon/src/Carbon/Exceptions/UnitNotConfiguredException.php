<?php

namespace Carbon\Exceptions;

class UnitNotConfiguredException extends \Carbon\Exceptions\UnitException
{
    /**
     * The unit.
     *
     * @var string
     */
    protected $unit;
    /**
     * Constructor.
     *
     * @param string         $unit
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($unit, $code = 0, \Throwable $previous = null)
    {
    }
    /**
     * Get the unit.
     *
     * @return string
     */
    public function getUnit() : string
    {
    }
}