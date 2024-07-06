<?php

namespace Stripe;

/**
 * Class ApiResource.
 */
abstract class ApiResource extends \Stripe\StripeObject
{
    use \Stripe\ApiOperations\Request;
    /**
     * @return \Stripe\Util\Set A list of fields that can be their own type of
     * API resource (say a nested card under an account for example), and if
     * that resource is set, it should be transmitted to the API on a create or
     * update. Doing so is not the default behavior because API resources
     * should normally be persisted on their own RESTful endpoints.
     */
    public static function getSavedNestedResources()
    {
    }
    /**
     * @var bool A flag that can be set a behavior that will cause this
     * resource to be encoded and sent up along with an update of its parent
     * resource. This is usually not desirable because resources are updated
     * individually on their own endpoints, but there are certain cases,
     * replacing a customer's source for example, where this is allowed.
     */
    public $saveWithParent = false;
    public function __set($k, $v)
    {
    }
    /**
     * @throws Exception\ApiErrorException
     *
     * @return ApiResource the refreshed resource
     */
    public function refresh()
    {
    }
    /**
     * @return string the base URL for the given class
     */
    public static function baseUrl()
    {
    }
    /**
     * @return string the endpoint URL for the given class
     */
    public static function classUrl()
    {
    }
    /**
     * @param null|string $id the ID of the resource
     *
     * @throws Exception\UnexpectedValueException if $id is null
     *
     * @return string the instance endpoint URL for the given class
     */
    public static function resourceUrl($id)
    {
    }
    /**
     * @return string the full API URL for this API resource
     */
    public function instanceUrl()
    {
    }
}