<?php

namespace Stripe;

/**
 * Class ApiResponse.
 */
class ApiResponse
{
    /**
     * @var null|array|CaseInsensitiveArray
     */
    public $headers;
    /**
     * @var string
     */
    public $body;
    /**
     * @var null|array
     */
    public $json;
    /**
     * @var int
     */
    public $code;
    /**
     * @param string $body
     * @param int $code
     * @param null|array|CaseInsensitiveArray $headers
     * @param null|array $json
     */
    public function __construct($body, $code, $headers, $json)
    {
    }
}