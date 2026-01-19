<?php

namespace Carbon\Exceptions;

class NotLocaleAwareException extends \InvalidArgumentException implements \Carbon\Exceptions\InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param mixed          $object
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($object, $code = 0, \Throwable $previous = null)
    {
    }
}