<?php

namespace Stripe;

/**
 * Class ApiRequestor.
 */
class ApiRequestor
{
    /**
     * @var null|string
     */
    private $_apiKey;
    /**
     * @var string
     */
    private $_apiBase;
    /**
     * @var HttpClient\ClientInterface
     */
    private static $_httpClient;
    /**
     * @var RequestTelemetry
     */
    private static $requestTelemetry;
    private static $OPTIONS_KEYS = ['api_key', 'idempotency_key', 'stripe_account', 'stripe_version', 'api_base'];
    /**
     * ApiRequestor constructor.
     *
     * @param null|string $apiKey
     * @param null|string $apiBase
     */
    public function __construct($apiKey = null, $apiBase = null)
    {
    }
    /**
     * Creates a telemetry json blob for use in 'X-Stripe-Client-Telemetry' headers.
     *
     * @static
     *
     * @param RequestTelemetry $requestTelemetry
     *
     * @return string
     */
    private static function _telemetryJson($requestTelemetry)
    {
    }
    /**
     * @static
     *
     * @param ApiResource|array|bool|mixed $d
     *
     * @return ApiResource|array|mixed|string
     */
    private static function _encodeObjects($d)
    {
    }
    /**
     * @param string     $method
     * @param string     $url
     * @param null|array $params
     * @param null|array $headers
     *
     * @throws Exception\ApiErrorException
     *
     * @return array tuple containing (ApiReponse, API key)
     */
    public function request($method, $url, $params = null, $headers = null)
    {
    }
    /**
     * @param string $rbody a JSON string
     * @param int $rcode
     * @param array $rheaders
     * @param array $resp
     *
     * @throws Exception\UnexpectedValueException
     * @throws Exception\ApiErrorException
     */
    public function handleErrorResponse($rbody, $rcode, $rheaders, $resp)
    {
    }
    /**
     * @static
     *
     * @param string $rbody
     * @param int    $rcode
     * @param array  $rheaders
     * @param array  $resp
     * @param array  $errorData
     *
     * @return Exception\ApiErrorException
     */
    private static function _specificAPIError($rbody, $rcode, $rheaders, $resp, $errorData)
    {
    }
    /**
     * @static
     *
     * @param bool|string $rbody
     * @param int         $rcode
     * @param array       $rheaders
     * @param array       $resp
     * @param string      $errorCode
     *
     * @return Exception\OAuth\OAuthErrorException
     */
    private static function _specificOAuthError($rbody, $rcode, $rheaders, $resp, $errorCode)
    {
    }
    /**
     * @static
     *
     * @param null|array $appInfo
     *
     * @return null|string
     */
    private static function _formatAppInfo($appInfo)
    {
    }
    /**
     * @static
     *
     * @param string $disabledFunctionsOutput - String value of the 'disable_function' setting, as output by \ini_get('disable_functions')
     * @param string $functionName - Name of the function we are interesting in seeing whether or not it is disabled
     * @param mixed $disableFunctionsOutput
     *
     * @return bool
     */
    private static function _isDisabled($disableFunctionsOutput, $functionName)
    {
    }
    /**
     * @static
     *
     * @param string $apiKey
     * @param null   $clientInfo
     *
     * @return array
     */
    private static function _defaultHeaders($apiKey, $clientInfo = null)
    {
    }
    /**
     * @param string $method
     * @param string $url
     * @param array $params
     * @param array $headers
     *
     * @throws Exception\AuthenticationException
     * @throws Exception\ApiConnectionException
     *
     * @return array
     */
    private function _requestRaw($method, $url, $params, $headers)
    {
    }
    /**
     * @param resource $resource
     *
     * @throws Exception\InvalidArgumentException
     *
     * @return \CURLFile|string
     */
    private function _processResourceParam($resource)
    {
    }
    /**
     * @param string $rbody
     * @param int    $rcode
     * @param array  $rheaders
     *
     * @throws Exception\UnexpectedValueException
     * @throws Exception\ApiErrorException
     *
     * @return array
     */
    private function _interpretResponse($rbody, $rcode, $rheaders)
    {
    }
    /**
     * @static
     *
     * @param HttpClient\ClientInterface $client
     */
    public static function setHttpClient($client)
    {
    }
    /**
     * @static
     *
     * Resets any stateful telemetry data
     */
    public static function resetTelemetry()
    {
    }
    /**
     * @return HttpClient\ClientInterface
     */
    private function httpClient()
    {
    }
}