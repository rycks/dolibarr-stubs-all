<?php

namespace Stripe\ApiOperations;

/**
 * Trait for resources that have nested resources.
 *
 * This trait should only be applied to classes that derive from StripeObject.
 */
trait NestedResource
{
    /**
     * @param string $method
     * @param string $url
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return \Stripe\StripeObject
     */
    protected static function _nestedResourceOperation($method, $url, $params = null, $options = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param string|null $nestedId
     *
     * @return string
     */
    protected static function _nestedResourceUrl($id, $nestedPath, $nestedId = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return \Stripe\StripeObject
     */
    protected static function _createNestedResource($id, $nestedPath, $params = null, $options = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param string|null $nestedId
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return \Stripe\StripeObject
     */
    protected static function _retrieveNestedResource($id, $nestedPath, $nestedId, $params = null, $options = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param string|null $nestedId
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return \Stripe\StripeObject
     */
    protected static function _updateNestedResource($id, $nestedPath, $nestedId, $params = null, $options = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param string|null $nestedId
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return \Stripe\StripeObject
     */
    protected static function _deleteNestedResource($id, $nestedPath, $nestedId, $params = null, $options = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return \Stripe\StripeObject
     */
    protected static function _allNestedResources($id, $nestedPath, $params = null, $options = null)
    {
    }
}