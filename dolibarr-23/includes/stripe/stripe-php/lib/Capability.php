<?php

namespace Stripe;

/**
 * This is an object representing a capability for a Stripe account.
 *
 * Related guide: <a
 * href="https://stripe.com/docs/connect/account-capabilities">Account
 * capabilities</a>.
 *
 * @property string $id The identifier for the capability.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string|\Stripe\Account $account The account for which the capability enables functionality.
 * @property null|\Stripe\StripeObject $future_requirements
 * @property bool $requested Whether the capability has been requested.
 * @property null|int $requested_at Time at which the capability was requested. Measured in seconds since the Unix epoch.
 * @property null|\Stripe\StripeObject $requirements
 * @property string $status The status of the capability. Can be <code>active</code>, <code>inactive</code>, <code>pending</code>, or <code>unrequested</code>.
 */
class Capability extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'capability';
    use \Stripe\ApiOperations\Update;
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';
    const STATUS_UNREQUESTED = 'unrequested';
    /**
     * @return string the API URL for this Stripe account reversal
     */
    public function instanceUrl()
    {
    }
    /**
     * @param array|string $_id
     * @param null|array|string $_opts
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function retrieve($_id, $_opts = null)
    {
    }
    /**
     * @param string $_id
     * @param null|array $_params
     * @param null|array|string $_options
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function update($_id, $_params = null, $_options = null)
    {
    }
}