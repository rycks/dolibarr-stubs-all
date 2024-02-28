<?php

namespace Stripe\ApiOperations;

/**
 * Trait for listable resources. Adds a `all()` static method to the class.
 *
 * This trait should only be applied to classes that derive from StripeObject.
 */
trait All
{
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return \Stripe\Collection of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
    }
}