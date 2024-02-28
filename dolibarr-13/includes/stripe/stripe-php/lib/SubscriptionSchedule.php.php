<?php

namespace Stripe;

/**
 * Class SubscriptionSchedule
 *
 * @property string $id
 * @property string $object
 * @property string $billing
 * @property mixed $billing_thresholds
 * @property int $canceled_at
 * @property int $completed_at
 * @property int $created
 * @property mixed $current_phase
 * @property string $customer
 * @property mixed $invoice_settings
 * @property boolean $livemode
 * @property StripeObject $metadata
 * @property mixed $phases
 * @property int $released_at
 * @property string $released_subscription
 * @property string $renewal_behavior
 * @property mixed $renewal_interval
 * @property string $revision
 * @property string $status
 * @property string $subscription
 *
 * @package Stripe
 */
class SubscriptionSchedule extends \Stripe\ApiResource
{
    const OBJECT_NAME = "subscription_schedule";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
    use \Stripe\ApiOperations\NestedResource;
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return SubscriptionSchedule The canceled subscription schedule.
     */
    public function cancel($params = null, $opts = null)
    {
    }
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return SubscriptionSchedule The released subscription schedule.
     */
    public function release($params = null, $opts = null)
    {
    }
}