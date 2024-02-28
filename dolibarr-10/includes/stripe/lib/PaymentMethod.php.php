<?php

namespace Stripe;

/**
 * Class PaymentMethod
 *
 * @property string $id
 * @property string $object
 * @property mixed $billing_details
 * @property mixed $card
 * @property mixed $card_present
 * @property int $created
 * @property string $customer
 * @property mixed $ideal
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property mixed $sepa_debit
 * @property string $type
 *
 * @package Stripe
 */
class PaymentMethod extends \Stripe\ApiResource
{
    const OBJECT_NAME = "payment_method";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return PaymentMethod The attached payment method.
     */
    public function attach($params = null, $opts = null)
    {
    }
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return PaymentMethod The detached payment method.
     */
    public function detach($params = null, $opts = null)
    {
    }
}