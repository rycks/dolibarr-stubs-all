<?php

namespace Carbon\Exceptions;

class NotACarbonClassException extends \InvalidArgumentException implements \Carbon\Exceptions\InvalidArgumentException
{
    /**
     * The className.
     *
     * @var string
     */
    protected $className;
    /**
     * Constructor.
     *
     * @param string         $className
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($className, $code = 0, \Throwable $previous = null)
    {
    }
    /**
     * Get the className.
     *
     * @return string
     */
    public function getClassName() : string
    {
    }
}