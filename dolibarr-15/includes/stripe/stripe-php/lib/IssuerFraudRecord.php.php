<?php

namespace Stripe;

/**
 * Class IssuerFraudRecord
 *
 * @property string $id
 * @property string $object
 * @property string $charge
 * @property int $created
 * @property int $post_date
 * @property string $fraud_type
 * @property bool $livemode
 *
 * @package Stripe
 */
class IssuerFraudRecord extends \Stripe\ApiResource
{
    const OBJECT_NAME = "issuer_fraud_record";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
}