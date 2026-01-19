<?php

namespace Stripe;

/**
 * Class UsageRecord
 *
 * @package Stripe
 *
 * @property string $id
 * @property string $object
 * @property string $invoice
 * @property bool $livemode
 * @property mixed $period
 * @property string $subscription_item
 * @property int $total_usage
 */
class UsageRecordSummary extends \Stripe\ApiResource
{
    const OBJECT_NAME = "usage_record_summary";
}