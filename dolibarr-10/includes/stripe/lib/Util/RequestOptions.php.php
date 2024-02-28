<?php

namespace Stripe\Util;

class RequestOptions
{
    /**
     * @var array A list of headers that should be persisted across requests.
     */
    public static $HEADERS_TO_PERSIST = ['Stripe-Account', 'Stripe-Version'];
    public $headers;
    public $apiKey;
    public $apiBase;
    public function __construct($key = null, $headers = [], $base = null)
    {
    }
    /**
     * Unpacks an options array and merges it into the existing RequestOptions
     * object.
     * @param array|string|null $options a key => value array
     *
     * @return RequestOptions
     */
    public function merge($options)
    {
    }
    /**
     * Discards all headers that we don't want to persist across requests.
     */
    public function discardNonPersistentHeaders()
    {
    }
    /**
     * Unpacks an options array into an RequestOptions object
     * @param array|string|null $options a key => value array
     *
     * @return RequestOptions
     */
    public static function parse($options)
    {
    }
}