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
    const PATH_REVISIONS = '/revisions';
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
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Collection The list of subscription schedule revisions.
     */
    public function revisions($params = null, $options = null)
    {
    }
    /**
     * @param array|null $id The ID of the subscription schedule to which the person belongs.
     * @param array|null $personId The ID of the person to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Revision
     */
    public static function retrieveRevision($id, $personId, $params = null, $opts = null)
    {
    }
    /**
     * @param array|null $id The ID of the subscription schedule on which to retrieve the persons.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection The list of revisions.
     */
    public static function allRevisions($id, $params = null, $opts = null)
    {
    }
}