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
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Collection The list of source transactions.
     */
    public function usageRecordSummaries($params = null, $options = null)
    {
    }
}