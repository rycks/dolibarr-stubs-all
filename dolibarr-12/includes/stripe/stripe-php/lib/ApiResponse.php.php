<?php

namespace Stripe;

/**
 * Class ApiResponse
 *
 * @package Stripe
 */
class ApiResponse
{
    public $headers;
    public $body;
    public $json;
    public $code;
    /**
     * @param string $body
     * @param integer $code
     * @param array|CaseInsensitiveArray|null $headers
     * @param array|null $json
     *
     * @return obj An APIResponse
     */
    public function __construct($body, $code, $headers, $json)
    {
    }
}