<?php

namespace Stripe;

/**
 * Class SubscriptionScheduleRevision
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property mixed $invoice_settings
 * @property boolean $livemode
 * @property mixed $phases
 * @property string $previous_revision
 * @property string $renewal_behavior
 * @property mixed $renewal_interval
 * @property string $schedule
 *
 * @package Stripe
 */
class SubscriptionScheduleRevision extends \Stripe\ApiResource
{
    const OBJECT_NAME = "subscription_schedule_revision";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
    /**
     * @return string The API URL for this Subscription Schedule Revision.
     */
    public function instanceUrl()
    {
    }
    /**
     * @param array|string $_id
     * @param array|string|null $_opts
     *
     * @throws \Stripe\Error\InvalidRequest
     */
    public static function retrieve($_id, $_opts = null)
    {
    }
    /**
     * @param array|string $_id
     * @param array|string|null $_opts
     *
     * @throws \Stripe\Error\InvalidRequest
     */
    public static function all($params = null, $opts = null)
    {
    }
}