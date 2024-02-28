<?php

namespace Stripe;

/**
 * Class SubscriptionItem
 *
 * @property string $id
 * @property string $object
 * @property mixed $billing_thresholds
 * @property int $created
 * @property StripeObject $metadata
 * @property Plan $plan
 * @property int $quantity
 * @property string $subscription
 * @property array $tax_rates
 *
 * @package Stripe
 */
class SubscriptionItem extends \Stripe\ApiResource
{
    const OBJECT_NAME = "subscription_item";
    const PATH_USAGE_RECORDS = '/usage_records';
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\NestedResource;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
    /**
     * @param string|null $id The ID of the subscription item on which to create the usage record.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function createUsageRecord($id, $params = null, $opts = null)
    {
    }
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Collection The list of usage record summaries.
     */
    public function usageRecordSummaries($params = null, $options = null)
    {
    }
}