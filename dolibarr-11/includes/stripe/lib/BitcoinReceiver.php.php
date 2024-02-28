<?php

namespace Stripe;

/**
 * Class BitcoinReceiver
 *
 * @package Stripe
 *
 * @deprecated Bitcoin receivers are deprecated. Please use the sources API instead.
 * @link https://stripe.com/docs/sources/bitcoin
 */
class BitcoinReceiver extends \Stripe\ApiResource
{
    const OBJECT_NAME = "bitcoin_receiver";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
    /**
     * @return string The class URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public static function classUrl()
    {
    }
    /**
     * @return string The instance URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public function instanceUrl()
    {
    }
}