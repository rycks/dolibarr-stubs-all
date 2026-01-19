<?php

namespace Stripe;

/**
 * Class ApplicationFeeRefund
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string $balance_transaction
 * @property int $created
 * @property string $currency
 * @property string $fee
 * @property StripeObject $metadata
 *
 * @package Stripe
 */
class ApplicationFeeRefund extends \Stripe\ApiResource
{
    const OBJECT_NAME = "fee_refund";
    use \Stripe\ApiOperations\Update {
        save as protected _save;
    }
    /**
     * @return string The API URL for this Stripe refund.
     */
    public function instanceUrl()
    {
    }
    /**
     * @param array|string|null $opts
     *
     * @return ApplicationFeeRefund The saved refund.
     */
    public function save($opts = null)
    {
    }
}