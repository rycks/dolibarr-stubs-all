<?php

namespace Carbon\Exceptions;

class BadFluentConstructorException extends \BadMethodCallException implements \Carbon\Exceptions\BadMethodCallException
{
    /**
     * The method.
     *
     * @var string
     */
    protected $method;
    /**
     * Constructor.
     *
     * @param string         $method
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($method, $code = 0, \Throwable $previous = null)
    {
    }
    /**
     * Get the method.
     *
     * @return string
     */
    public function getMethod() : string
    {
    }
}