<?php

namespace Carbon\Exceptions;

// This will extends OutOfRangeException instead of InvalidArgumentException since 3.0.0
// use OutOfRangeException as BaseOutOfRangeException;
class OutOfRangeException extends \InvalidArgumentException implements \Carbon\Exceptions\InvalidArgumentException
{
    /**
     * The unit or name of the value.
     *
     * @var string
     */
    private $unit;
    /**
     * The range minimum.
     *
     * @var mixed
     */
    private $min;
    /**
     * The range maximum.
     *
     * @var mixed
     */
    private $max;
    /**
     * The invalid value.
     *
     * @var mixed
     */
    private $value;
    /**
     * Constructor.
     *
     * @param string         $unit
     * @param mixed          $min
     * @param mixed          $max
     * @param mixed          $value
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($unit, $min, $max, $value, $code = 0, \Throwable $previous = null)
    {
    }
    /**
     * @return mixed
     */
    public function getMax()
    {
    }
    /**
     * @return mixed
     */
    public function getMin()
    {
    }
    /**
     * @return mixed
     */
    public function getUnit()
    {
    }
    /**
     * @return mixed
     */
    public function getValue()
    {
    }
}