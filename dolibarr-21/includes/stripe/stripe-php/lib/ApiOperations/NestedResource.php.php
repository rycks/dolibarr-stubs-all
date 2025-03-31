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
     * @param null|array $params
     * @param null|array|string $options
     *
     * @return \Stripe\StripeObject
     */
    protected static function _nestedResourceOperation($method, $url, $params = null, $options = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param null|string $nestedId
     *
     * @return string
     */
    protected static function _nestedResourceUrl($id, $nestedPath, $nestedId = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\StripeObject
     */
    protected static function _createNestedResource($id, $nestedPath, $params = null, $options = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param null|string $nestedId
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\StripeObject
     */
    protected static function _retrieveNestedResource($id, $nestedPath, $nestedId, $params = null, $options = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param null|string $nestedId
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\StripeObject
     */
    protected static function _updateNestedResource($id, $nestedPath, $nestedId, $params = null, $options = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param null|string $nestedId
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\StripeObject
     */
    protected static function _deleteNestedResource($id, $nestedPath, $nestedId, $params = null, $options = null)
    {
    }
    /**
     * @param string $id
     * @param string $nestedPath
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\StripeObject
     */
    protected static function _allNestedResources($id, $nestedPath, $params = null, $options = null)
    {
    }
}