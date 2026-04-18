<?php

namespace Carbon\Exceptions;

class ImmutableException extends \RuntimeException implements \Carbon\Exceptions\RuntimeException
{
    /**
     * The value.
     *
     * @var string
     */
    protected $value;
    /**
     * Constructor.
     *
     * @param string         $value    the immutable type/value
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($value, $code = 0, \Throwable $previous = null)
    {
    }
    /**
     * Get the value.
     *
     * @return string
     */
    public function getValue() : string
    {
    }
}