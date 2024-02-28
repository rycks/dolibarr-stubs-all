<?php

namespace Stripe;

/**
 * Class WebhookEndpoint
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property string[] $enabled_events
 * @property bool $livemode
 * @property string $secret
 * @property string $status
 * @property string $url
 *
 * @package Stripe
 */
class WebhookEndpoint extends \Stripe\ApiResource
{
    const OBJECT_NAME = "webhook_endpoint";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}