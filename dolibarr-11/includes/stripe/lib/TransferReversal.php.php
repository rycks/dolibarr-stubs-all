<?php

namespace Stripe;

/**
 * Class TransferReversal
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string $balance_transaction
 * @property int $created
 * @property string $currency
 * @property string $destination_payment_refund
 * @property StripeObject $metadata
 * @property string $source_refund
 * @property string $transfer
 *
 * @package Stripe
 */
class TransferReversal extends \Stripe\ApiResource
{
    const OBJECT_NAME = "transfer_reversal";
    use \Stripe\ApiOperations\Update {
        save as protected _save;
    }
    /**
     * @return string The API URL for this Stripe transfer reversal.
     */
    public function instanceUrl()
    {
    }
    /**
     * @param array|string|null $opts
     *
     * @return TransferReversal The saved reversal.
     */
    public function save($opts = null)
    {
    }
}