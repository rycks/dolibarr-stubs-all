<?php

namespace Stripe;

/**
 * Class SKU
 *
 * @property string $id
 * @property string $object
 * @property bool $active
 * @property mixed $attributes
 * @property int $created
 * @property string $currency
 * @property string $image
 * @property mixed $inventory
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property mixed $package_dimensions
 * @property int $price
 * @property string $product
 * @property int $updated
 *
 * @package Stripe
 */
class SKU extends \Stripe\ApiResource
{
    const OBJECT_NAME = "sku";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}