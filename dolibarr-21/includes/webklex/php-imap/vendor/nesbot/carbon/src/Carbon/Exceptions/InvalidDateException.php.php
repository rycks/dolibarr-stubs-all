<?php

namespace Carbon\Exceptions;

class InvalidDateException extends \InvalidArgumentException implements \Carbon\Exceptions\InvalidArgumentException
{
    /**
     * The invalid field.
     *
     * @var string
     */
    private $field;
    /**
     * The invalid value.
     *
     * @var mixed
     */
    private $value;
    /**
     * Constructor.
     *
     * @param string         $field
     * @param mixed          $value
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($field, $value, $code = 0, \Throwable $previous = null)
    {
    }
    /**
     * Get the invalid field.
     *
     * @return string
     */
    public function getField()
    {
    }
    /**
     * Get the invalid value.
     *
     * @return mixed
     */
    public function getValue()
    {
    }
}