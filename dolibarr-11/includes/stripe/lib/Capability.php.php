<?php

namespace Stripe;

/**
 * Class Capability
 *
 * @package Stripe
 *
 * @property string $id
 * @property string $object
 * @property string $account
 * @property bool $requested
 * @property int $requested_at
 * @property mixed $requirements
 * @property string $status
 */
class Capability extends \Stripe\ApiResource
{
    const OBJECT_NAME = "capability";
    use \Stripe\ApiOperations\Update;
    /**
     * Possible string representations of a capability's status.
     * @link https://stripe.com/docs/api/capabilities/object#capability_object-status
     */
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';
    const STATUS_UNREQUESTED = 'unrequested';
    /**
     * @return string The API URL for this Stripe account reversal.
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
}