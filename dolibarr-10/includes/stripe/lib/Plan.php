<?php

namespace Stripe;

/**
 * Class Plan
 *
 * @package Stripe
 *
 * @property string $id
 * @property string $object
 * @property bool $active
 * @property string $aggregate_usage
 * @property int $amount
 * @property string $billing_scheme
 * @property int $created
 * @property string $currency
 * @property string $interval
 * @property int $interval_count
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property string $nickname
 * @property string $product
 * @property mixed $tiers
 * @property string $tiers_mode
 * @property mixed $transform_usage
 * @property int $trial_period_days
 * @property string $usage_type
 */
class Plan extends \Stripe\ApiResource
{
    const OBJECT_NAME = "plan";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}