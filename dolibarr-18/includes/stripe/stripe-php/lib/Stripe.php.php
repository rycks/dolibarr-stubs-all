<?php

namespace Stripe;

/**
 * Class Stripe.
 */
class Stripe
{
    /** @var string The Stripe API key to be used for requests. */
    public static $apiKey;
    /** @var string The Stripe client_id to be used for Connect requests. */
    public static $clientId;
    /** @var string The base URL for the Stripe API. */
    public static $apiBase = 'https://api.stripe.com';
    /** @var string The base URL for the OAuth API. */
    public static $connectBase = 'https://connect.stripe.com';
    /** @var string The base URL for the Stripe API uploads endpoint. */
    public static $apiUploadBase = 'https://files.stripe.com';
    /** @var null|string The version of the Stripe API to use for requests. */
    public static $apiVersion = null;
    /** @var null|string The account ID for connected accounts requests. */
    public static $accountId = null;
    /** @var string Path to the CA bundle used to verify SSL certificates */
    public static $caBundlePath = null;
    /** @var bool Defaults to true. */
    public static $verifySslCerts = true;
    /** @var array The application's information (name, version, URL) */
    public static $appInfo = null;
    /**
     * @var null|Util\LoggerInterface the logger to which the library will
     *   produce messages
     */
    public static $logger = null;
    /** @var int Maximum number of request retries */
    public static $maxNetworkRetries = 0;
    /** @var bool Whether client telemetry is enabled. Defaults to true. */
    public static $enableTelemetry = true;
    /** @var float Maximum delay between retries, in seconds */
    private static $maxNetworkRetryDelay = 2.0;
    /** @var float Maximum delay between retries, in seconds, that will be respected from the Stripe API */
    private static $maxRetryAfter = 60.0;
    /** @var float Initial delay between retries, in seconds */
    private static $initialNetworkRetryDelay = 0.5;
    const VERSION = '10.7.0';
    /**
     * @return string the API key used for requests
     */
    public static function getApiKey()
    {
    }
    /**
     * @return string the client_id used for Connect requests
     */
    public static function getClientId()
    {
    }
    /**
     * @return Util\LoggerInterface the logger to which the library will
     *   produce messages
     */
    public static function getLogger()
    {
    }
    /**
     * @param \Psr\Log\LoggerInterface|Util\LoggerInterface $logger the logger to which the library
     *   will produce messages
     */
    public static function setLogger($logger)
    {
    }
    /**
     * Sets the API key to be used for requests.
     *
     * @param string $apiKey
     */
    public static function setApiKey($apiKey)
    {
    }
    /**
     * Sets the client_id to be used for Connect requests.
     *
     * @param string $clientId
     */
    public static function setClientId($clientId)
    {
    }
    /**
     * @return string The API version used for requests. null if we're using the
     *    latest version.
     */
    public static function getApiVersion()
    {
    }
    /**
     * @param string $apiVersion the API version to use for requests
     */
    public static function setApiVersion($apiVersion)
    {
    }
    /**
     * @return string
     */
    private static function getDefaultCABundlePath()
    {
    }
    /**
     * @return string
     */
    public static function getCABundlePath()
    {
    }
    /**
     * @param string $caBundlePath
     */
    public static function setCABundlePath($caBundlePath)
    {
    }
    /**
     * @return bool
     */
    public static function getVerifySslCerts()
    {
    }
    /**
     * @param bool $verify
     */
    public static function setVerifySslCerts($verify)
    {
    }
    /**
     * @return null|string The Stripe account ID for connected account
     *   requests
     */
    public static function getAccountId()
    {
    }
    /**
     * @param null|string $accountId the Stripe account ID to set for connected
     *   account requests
     */
    public static function setAccountId($accountId)
    {
    }
    /**
     * @return null|array The application's information
     */
    public static function getAppInfo()
    {
    }
    /**
     * @param string $appName The application's name
     * @param null|string $appVersion The application's version
     * @param null|string $appUrl The application's URL
     * @param null|string $appPartnerId The application's partner ID
     */
    public static function setAppInfo($appName, $appVersion = null, $appUrl = null, $appPartnerId = null)
    {
    }
    /**
     * @return int Maximum number of request retries
     */
    public static function getMaxNetworkRetries()
    {
    }
    /**
     * @param int $maxNetworkRetries Maximum number of request retries
     */
    public static function setMaxNetworkRetries($maxNetworkRetries)
    {
    }
    /**
     * @return float Maximum delay between retries, in seconds
     */
    public static function getMaxNetworkRetryDelay()
    {
    }
    /**
     * @return float Maximum delay between retries, in seconds, that will be respected from the Stripe API
     */
    public static function getMaxRetryAfter()
    {
    }
    /**
     * @return float Initial delay between retries, in seconds
     */
    public static function getInitialNetworkRetryDelay()
    {
    }
    /**
     * @return bool Whether client telemetry is enabled
     */
    public static function getEnableTelemetry()
    {
    }
    /**
     * @param bool $enableTelemetry Enables client telemetry.
     *
     * Client telemetry enables timing and request metrics to be sent back to Stripe as an HTTP Header
     * with the current request. This enables Stripe to do latency and metrics analysis without adding extra
     * overhead (such as extra network calls) on the client.
     */
    public static function setEnableTelemetry($enableTelemetry)
    {
    }
}