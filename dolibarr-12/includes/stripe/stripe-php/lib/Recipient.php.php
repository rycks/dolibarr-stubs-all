<?php

namespace Stripe;

/**
 * Class Recipient
 *
 * @package Stripe
 *
 * @property string $id
 * @property string $object
 * @property mixed $active_account
 * @property Collection $cards
 * @property int $created
 * @property string $default_card
 * @property string $description
 * @property string $email
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property string $migrated_to
 * @property string $name
 * @property string $rolled_back_from
 * @property string $type
 */
class Recipient extends \Stripe\ApiResource
{
    const OBJECT_NAME = "recipient";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
    /**
     * @param array|null $params
     *
     * @return Collection of the Recipient's Transfers
     */
    public function transfers($params = null)
    {
    }
}