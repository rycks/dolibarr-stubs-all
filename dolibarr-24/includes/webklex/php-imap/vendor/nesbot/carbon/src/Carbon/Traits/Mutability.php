<?php

namespace Carbon\Traits;

/**
 * Trait Mutability.
 *
 * Utils to know if the current object is mutable or immutable and convert it.
 */
trait Mutability
{
    use \Carbon\Traits\Cast;
    /**
     * Returns true if the current class/instance is mutable.
     *
     * @return bool
     */
    public static function isMutable()
    {
    }
    /**
     * Returns true if the current class/instance is immutable.
     *
     * @return bool
     */
    public static function isImmutable()
    {
    }
    /**
     * Return a mutable copy of the instance.
     *
     * @return Carbon
     */
    public function toMutable()
    {
    }
    /**
     * Return a immutable copy of the instance.
     *
     * @return CarbonImmutable
     */
    public function toImmutable()
    {
    }
}