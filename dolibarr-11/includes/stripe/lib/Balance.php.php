<?php

namespace Stripe;

/**
 * Class Balance
 *
 * @property string $object
 * @property array $available
 * @property array $connect_reserved
 * @property bool $livemode
 * @property array $pending
 *
 * @package Stripe
 */
class Balance extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = "balance";
    /**
     * @param array|string|null $opts
     *
     * @return Balance
     */
    public static function retrieve($opts = null)
    {
    }
}