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
     * @param string $id The ID of the resource to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return static The updated resource.
     */
    public static function update($id, $params = null, $opts = null)
    {
    }
    /**
     * @param array|string|null $opts
     *
     * @return static The saved resource.
     */
    public function save($opts = null)
    {
    }
}