<?php

namespace Stripe\ApiOperations;

/**
 * Trait for updatable resources. Adds an `update()` static method and a
 * `save()` method to the class.
 *
 * This trait should only be applied to classes that derive from StripeObject.
 */
trait Update
{
    /**
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return static the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
    }
    /**
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return static the saved resource
     *
     * @deprecated The `save` method is deprecated and will be removed in a
     *     future major version of the library. Use the static method `update`
     *     on the resource instead.
     */
    public function save($opts = null)
    {
    }
}