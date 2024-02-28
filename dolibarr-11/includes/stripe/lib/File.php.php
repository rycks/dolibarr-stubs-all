<?php

namespace Stripe;

/**
 * Class File
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property string $filename
 * @property Collection $links
 * @property string $purpose
 * @property int $size
 * @property string $title
 * @property string $type
 * @property string $url
 *
 * @package Stripe
 */
class File extends \Stripe\ApiResource
{
    // This resource can have two different object names. In latter API
    // versions, only `file` is used, but since stripe-php may be used with
    // any API version, we need to support deserializing the older
    // `file_upload` object into the same class.
    const OBJECT_NAME = "file";
    const OBJECT_NAME_ALT = "file_upload";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create {
        create as protected _create;
    }
    use \Stripe\ApiOperations\Retrieve;
    public static function classUrl()
    {
    }
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return \Stripe\File The created resource.
     */
    public static function create($params = null, $options = null)
    {
    }
}