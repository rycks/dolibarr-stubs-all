<?php

namespace Stripe\Util;

class RequestOptions
{
    /**
     * @var array<string> a list of headers that should be persisted across requests
     */
    public static $HEADERS_TO_PERSIST = ['Stripe-Account', 'Stripe-Version'];
    /** @var array<string, string> */
    public $headers;
    /** @var null|string */
    public $apiKey;
    /** @var null|string */
    public $apiBase;
    /**
     * @param null|string $key
     * @param array<string, string> $headers
     * @param null|string $base
     */
    public function __construct($key = null, $headers = [], $base = null)
    {
    }
    /**
     * @return array<string, string>
     */
    public function __debugInfo()
    {
    }
    /**
     * Unpacks an options array and merges it into the existing RequestOptions
     * object.
     *
     * @param null|array|RequestOptions|string $options a key => value array
     * @param bool $strict when true, forbid string form and arbitrary keys in array form
     *
     * @return RequestOptions
     */
    public function merge($options, $strict = false)
    {
    }
    /**
     * Discards all headers that we don't want to persist across requests.
     */
    public function discardNonPersistentHeaders()
    {
    }
    /**
     * Unpacks an options array into an RequestOptions object.
     *
     * @param null|array|RequestOptions|string $options a key => value array
     * @param bool $strict when true, forbid string form and arbitrary keys in array form
     *
     * @throws \Stripe\Exception\InvalidArgumentException
     *
     * @return RequestOptions
     */
    public static function parse($options, $strict = false)
    {
    }
    private function redactedApiKey()
    {
    }
}