<?php

namespace Stripe;

class ThreeDSecure extends \Stripe\ApiResource
{
    const OBJECT_NAME = "three_d_secure";
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
    }
}