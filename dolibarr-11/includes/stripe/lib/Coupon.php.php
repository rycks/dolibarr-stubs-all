<?php

namespace Stripe;

/**
 * Class Coupon
 *
 * @property string $id
 * @property string $object
 * @property int $amount_off
 * @property int $created
 * @property string $currency
 * @property string $duration
 * @property int $duration_in_months
 * @property bool $livemode
 * @property int $max_redemptions
 * @property StripeObject $metadata
 * @property string $name
 * @property float $percent_off
 * @property int $redeem_by
 * @property int $times_redeemed
 * @property bool $valid
 *
 * @package Stripe
 */
class Coupon extends \Stripe\ApiResource
{
    const OBJECT_NAME = "coupon";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}