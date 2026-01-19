<?php

namespace Stripe;

/**
 * Class ExchangeRate
 *
 * @package Stripe
 */
class ExchangeRate extends \Stripe\ApiResource
{
    const OBJECT_NAME = "exchange_rate";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
}