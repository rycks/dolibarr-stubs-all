<?php

namespace Stripe;

/**
 * Class StripeObject.
 */
class StripeObject implements \ArrayAccess, \Countable, \JsonSerializable
{
    /** @var Util\RequestOptions */
    protected $_opts;
    /** @var array */
    protected $_originalValues;
    /** @var array */
    protected $_values;
    /** @var Util\Set */
    protected $_unsavedValues;
    /** @var Util\Set */
    protected $_transientValues;
    /** @var null|array */
    protected $_retrieveOptions;
    /** @var null|ApiResponse */
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
     *
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
     * This unfortunately needs to be public to be used in Util\Util.
     *
     * @param array $values
     * @param null|array|string|Util\RequestOptions $opts
     *
     * @return static the object constructed from the given values
     */
    public static function constructFrom($values, $opts = null)
    {
    }
    /**
     * Refreshes this object using the provided values.
     *
     * @param array $values
     * @param null|array|string|Util\RequestOptions $opts
     * @param bool $partial defaults to false
     */
    public function refreshFrom($values, $opts, $partial = false)
    {
    }
    /**
     * Mass assigns attributes on the model.
     *
     * @param array $values
     * @param null|array|string|Util\RequestOptions $opts
     * @param bool $dirty defaults to true
     */
    public function updateAttributes($values, $opts = null, $dirty = true)
    {
    }
    /**
     * @param bool $force defaults to false
     *
     * @return array a recursive mapping of attributes to values for this object,
     *    including the proper value for deleted attributes
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
    /**
     * Returns an associative array with the key and values composing the
     * Stripe object.
     *
     * @return array the associative array
     */
    public function toArray()
    {
    }
    /**
     * Returns a pretty JSON representation of the Stripe object.
     *
     * @return string the JSON representation of the Stripe object
     */
    public function toJSON()
    {
    }
    public function __toString()
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
     *
     * @param mixed $obj
     */
    protected static function deepCopy($obj)
    {
    }
    /**
     * Returns a hash of empty values for all the values that are in the given
     * StripeObject.
     *
     * @param mixed $obj
     */
    public static function emptyValues($obj)
    {
    }
    /**
     * @return null|ApiResponse The last response from the Stripe API
     */
    public function getLastResponse()
    {
    }
    /**
     * Sets the last response from the Stripe API.
     *
     * @param ApiResponse $resp
     */
    public function setLastResponse($resp)
    {
    }
    /**
     * Indicates whether or not the resource has been deleted on the server.
     * Note that some, but not all, resources can indicate whether they have
     * been deleted.
     *
     * @return bool whether the resource is deleted
     */
    public function isDeleted()
    {
    }
}