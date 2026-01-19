<?php

namespace Stripe;

/**
 * Class AlipayAccount
 *
 * @package Stripe
 *
 * @deprecated Alipay accounts are deprecated. Please use the sources API instead.
 * @link https://stripe.com/docs/sources/alipay
 */
class AlipayAccount extends \Stripe\ApiResource
{
    const OBJECT_NAME = "alipay_account";
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Update;
    /**
     * @return string The instance URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public function instanceUrl()
    {
    }
    /**
     * @param array|string $_id
     * @param array|string|null $_opts
     *
     * @throws \Stripe\Error\InvalidRequest
     *
     * @deprecated Alipay accounts are deprecated. Please use the sources API instead.
     * @link https://stripe.com/docs/sources/alipay
     */
    public static function retrieve($_id, $_opts = null)
    {
    }
    /**
     * @param string $_id
     * @param array|null $_params
     * @param array|string|null $_options
     *
     * @throws \Stripe\Error\InvalidRequest
     *
     * @deprecated Alipay accounts are deprecated. Please use the sources API instead.
     * @link https://stripe.com/docs/sources/alipay
     */
    public static function update($_id, $_params = null, $_options = null)
    {
    }
}