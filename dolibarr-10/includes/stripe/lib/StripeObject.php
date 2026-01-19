<?php

namespace Stripe;

/**
 * Class StripeObject
 *
 * @package Stripe
 */
class StripeObject implements \ArrayAccess, \Countable, \JsonSerializable
{
    protected $_opts;
    protected $_originalValues;
    protected $_values;
    protected $_unsavedValues;
    protected $_transientValues;
    protected $_retrieveOptions;
    protected $_lastResponse;
    /**
     * @return Util\Set Attributes that should not be sent to the API because
     *    they're not updatable (e.g. ID).
     */
    public static function getPermanentAttributes()
    {
    }
    /**
     * Additive objects are subobjects in the API that don't have the same
     * semantics as most subobjects, which are fully replaced when they're set.
     * This is best illustrated by example. The `source` parameter sent when
     * updating a subscription is *not* additive; if we set it:
     *
     *     source[object]=card&source[number]=123
     *
     * We expect the old `source` object to have been overwritten completely. If
     * the previous source had an `address_state` key associated with it and we
     * didn't send one this time, that value of `address_state` is gone.
     *
     * By contrast, additive objects are those that will have new data added to
     * them while keeping any existing data in place. The only known case of its
     * use is for `metadata`, but it could in theory be more general. As an
     * example, say we have a `metadata` object that looks like this on the
     * server side:
     *
     *     metadata = ["old" => "old_value"]
     *
     * If we update the object with `metadata[new]=new_value`, the server side
     * object now has *both* fields:
     *
     *     metadata = ["old" => "old_value", "new" => "new_value"]
     *
     * This is okay in itself because usually users will want to treat it as
     * additive:
     *
     *     $obj->metadata["new"] = "new_value";
     *     $obj->save();
     *
     * However, in other cases, they may want to replace the entire existing
     * contents:
     *
     *     $obj->metadata = ["new" => "new_value"];
     *     $obj->save();
     *
     * This is where things get a little bit tricky because in order to clear
     * any old keys that may have existed, we actually have to send an explicit
     * empty string to the server. So the operation above would have to send
     * this form to get the intended behavior:
     *
     *     metadata[old]=&metadata[new]=new_value
     *
     * This method allows us to track which parameters are considered additive,
     * and lets us behave correctly where appropriate when serializing
     * parameters to be sent.
     *
     * @return Util\Set Set of additive parameters
     */
    public static function getAdditiveParams()
    {
    }
    public function __construct($id = null, $opts = null)
    {
    }
    // Standard accessor magic methods
    public function __set($k, $v)
    {
    }
    public function __isset($k)
    {
    }
    public function __unset($k)
    {
    }
    public function &__get($k)
    {
    }
    // Magic method for var_dump output. Only works with PHP >= 5.6
    public function __debugInfo()
    {
    }
    // ArrayAccess methods
    public function offsetSet($k, $v)
    {
    }
    public function offsetExists($k)
    {
    }
    public function offsetUnset($k)
    {
    }
    public function offsetGet($k)
    {
    }
    // Countable method
    public function count()
    {
    }
    public function keys()
    {
    }
    public function values()
    {
    }
    /**
     * This unfortunately needs to be public to be used in Util\Util
     *
     * @param array $values
     * @param null|string|array|Util\RequestOptions $opts
     *
     * @return static The object constructed from the given values.
     */
    public static function constructFrom($values, $opts = null)
    {
    }
    /**
     * Refreshes this object using the provided values.
     *
     * @param array $values
     * @param null|string|array|Util\RequestOptions $opts
     * @param boolean $partial Defaults to false.
     */
    public function refreshFrom($values, $opts, $partial = false)
    {
    }
    /**
     * Mass assigns attributes on the model.
     *
     * @param array $values
     * @param null|string|array|Util\RequestOptions $opts
     * @param boolean $dirty Defaults to true.
     */
    public function updateAttributes($values, $opts = null, $dirty = true)
    {
    }
    /**
     * @return array A recursive mapping of attributes to values for this object,
     *    including the proper value for deleted attributes.
     */
    public function serializeParameters($force = false)
    {
    }
    public function serializeParamsValue($value, $original, $unsaved, $force, $key = null)
    {
    }
    public function jsonSerialize()
    {
    }
    public function __toJSON()
    {
    }
    public function __toString()
    {
    }
    public function __toArray($recursive = false)
    {
    }
    /**
     * Sets all keys within the StripeObject as unsaved so that they will be
     * included with an update when `serializeParameters` is called. This
     * method is also recursive, so any StripeObjects contained as values or
     * which are values in a tenant array are also marked as dirty.
     */
    public function dirty()
    {
    }
    protected function dirtyValue($value)
    {
    }
    /**
     * Produces a deep copy of the given object including support for arrays
     * and StripeObjects.
     */
    protected static function deepCopy($obj)
    {
    }
    /**
     * Returns a hash of empty values for all the values that are in the given
     * StripeObject.
     */
    public static function emptyValues($obj)
    {
    }
    /**
     * @return object The last response from the Stripe API
     */
    public function getLastResponse()
    {
    }
    /**
     * Sets the last response from the Stripe API
     *
     * @param ApiResponse $resp
     * @return void
     */
    public function setLastResponse($resp)
    {
    }
    /**
     * Indicates whether or not the resource has been deleted on the server.
     * Note that some, but not all, resources can indicate whether they have
     * been deleted.
     *
     * @return bool Whether the resource is deleted.
     */
    public function isDeleted()
    {
    }
}