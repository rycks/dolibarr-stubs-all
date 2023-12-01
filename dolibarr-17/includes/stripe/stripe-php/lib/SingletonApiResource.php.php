<?php

namespace Stripe;

/**
 * Class SingletonApiResource.
 */
abstract class SingletonApiResource extends \Stripe\ApiResource
{
    protected static function _singletonRetrieve($options = null)
    {
    }
    /**
     * @return string the endpoint associated with this singleton class
     */
    public static function classUrl()
    {
    }
    /**
     * @return string the endpoint associated with this singleton API resource
     */
    public function instanceUrl()
    {
    }
}