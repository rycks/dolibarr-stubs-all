<?php

namespace Carbon\Exceptions;

class BadFluentSetterException extends \BadMethodCallException implements \Carbon\Exceptions\BadMethodCallException
{
    /**
     * The setter.
     *
     * @var string
     */
    protected $setter;
    /**
     * Constructor.
     *
     * @param string         $setter
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($setter, $code = 0, \Throwable $previous = null)
    {
    }
    /**
     * Get the setter.
     *
     * @return string
     */
    public function getSetter() : string
    {
    }
}