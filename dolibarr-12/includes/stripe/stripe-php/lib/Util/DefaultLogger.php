<?php

namespace Stripe\Util;

/**
 * A very basic implementation of LoggerInterface that has just enough
 * functionality that it can be the default for this library.
 */
class DefaultLogger implements \Stripe\Util\LoggerInterface
{
    public function error($message, array $context = [])
    {
    }
}