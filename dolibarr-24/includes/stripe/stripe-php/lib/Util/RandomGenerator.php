<?php

namespace Stripe\Util;

/**
 * A basic random generator. This is in a separate class so we the generator
 * can be injected as a dependency and replaced with a mock in tests.
 */
class RandomGenerator
{
    /**
     * Returns a random value between 0 and $max.
     *
     * @param float $max (optional)
     *
     * @return float
     */
    public function randFloat($max = 1.0)
    {
    }
    /**
     * Returns a v4 UUID.
     *
     * @return string
     */
    public function uuid()
    {
    }
}