<?php

namespace Stripe;

/**
 * Class BankAccount
 *
 * @property string $id
 * @property string $object
 * @property string $account
 * @property string $account_holder_name
 * @property string $account_holder_type
 * @property string $bank_name
 * @property string $country
 * @property string $currency
 * @property string $customer
 * @property bool $default_for_currency
 * @property string $fingerprint
 * @property string $last4
 * @property StripeObject $metadata
 * @property string $routing_number
 * @property string $status
 *
 * @package Stripe
 */
class BankAccount extends \Stripe\ApiResource
{
    const OBJECT_NAME = "bank_account";
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Update;
    /**
     * Possible string representations of the bank verification status.
     * @link https://stripe.com/docs/api/external_account_bank_accounts/object#account_bank_account_object-status
     */
    const STATUS_NEW = 'new';
    const STATUS_VALIDATED = 'validated';
    const STATUS_VERIFIED = 'verified';
    const STATUS_VERIFICATION_FAILED = 'verification_failed';
    const STATUS_ERRORED = 'errored';
    /**
     * @return string The instance URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
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
     * @param string $_id
     * @param array|null $_params
     * @param array|string|null $_options
     *
     * @throws \Stripe\Error\InvalidRequest
     */
    public static function update($_id, $_params = null, $_options = null)
    {
    }
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return BankAccount The verified bank account.
     */
    public function verify($params = null, $options = null)
    {
    }
}