<?php

namespace Stripe;

/**
 * Class SingletonApiResource
 *
 * @package Stripe
 */
abstract class SingletonApiResource extends \Stripe\ApiResource
{
    protected static function _singletonRetrieve($options = null)
    {
    }
    /**
     * @return string The endpoint associated with this singleton class.
     */
    public static function classUrl()
    {
    }
    /**
     * @return string The endpoint associated with this singleton API resource.
     */
    public function instanceUrl()
    {
    }
}