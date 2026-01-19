<?php

namespace Stripe;

/**
 * Class Transfer
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $amount_reversed
 * @property string $balance_transaction
 * @property int $created
 * @property string $currency
 * @property string $description
 * @property string $destination
 * @property string $destination_payment
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property Collection $reversals
 * @property bool $reversed
 * @property string $source_transaction
 * @property string $source_type
 * @property string $transfer_group
 *
 * @package Stripe
 */
class Transfer extends \Stripe\ApiResource
{
    const OBJECT_NAME = "transfer";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\NestedResource;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
    const PATH_REVERSALS = '/reversals';
    /**
     * Possible string representations of the source type of the transfer.
     * @link https://stripe.com/docs/api/transfers/object#transfer_object-source_type
     */
    const SOURCE_TYPE_ALIPAY_ACCOUNT = 'alipay_account';
    const SOURCE_TYPE_BANK_ACCOUNT = 'bank_account';
    const SOURCE_TYPE_CARD = 'card';
    const SOURCE_TYPE_FINANCING = 'financing';
    /**
     * @return TransferReversal The created transfer reversal.
     */
    public function reverse($params = null, $opts = null)
    {
    }
    /**
     * @return Transfer The canceled transfer.
     */
    public function cancel()
    {
    }
    /**
     * @param string|null $id The ID of the transfer on which to create the reversal.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return TransferReversal
     */
    public static function createReversal($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the transfer to which the reversal belongs.
     * @param array|null $reversalId The ID of the reversal to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return TransferReversal
     */
    public static function retrieveReversal($id, $reversalId, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the transfer to which the reversal belongs.
     * @param array|null $reversalId The ID of the reversal to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return TransferReversal
     */
    public static function updateReversal($id, $reversalId, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the transfer on which to retrieve the reversals.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection The list of reversals.
     */
    public static function allReversals($id, $params = null, $opts = null)
    {
    }
}