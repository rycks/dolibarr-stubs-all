<?php

namespace Carbon\Exceptions;

class UnknownGetterException extends \InvalidArgumentException implements \Carbon\Exceptions\InvalidArgumentException
{
    /**
     * The getter.
     *
     * @var string
     */
    protected $getter;
    /**
     * Constructor.
     *
     * @param string         $getter   getter name
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($getter, $code = 0, \Throwable $previous = null)
    {
    }
    /**
     * Get the getter.
     *
     * @return string
     */
    public function getGetter() : string
    {
    }
}