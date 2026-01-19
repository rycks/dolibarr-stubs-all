<?php

namespace Stripe;

/**
 * Class ApplePayDomain
 *
 * @package Stripe
 */
class ApplePayDomain extends \Stripe\ApiResource
{
    const OBJECT_NAME = "apple_pay_domain";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    /**
     * @return string The class URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public static function classUrl()
    {
    }
}