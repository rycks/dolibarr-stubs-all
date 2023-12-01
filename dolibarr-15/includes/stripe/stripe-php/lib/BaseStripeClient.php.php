<?php

namespace Stripe;

class BaseStripeClient implements \Stripe\StripeClientInterface
{
    /** @var string default base URL for Stripe's API */
    const DEFAULT_API_BASE = 'https://api.stripe.com';
    /** @var string default base URL for Stripe's OAuth API */
    const DEFAULT_CONNECT_BASE = 'https://connect.stripe.com';
    /** @var string default base URL for Stripe's Files API */
    const DEFAULT_FILES_BASE = 'https://files.stripe.com';
    /** @var array<string, mixed> */
    private $config;
    /** @var \Stripe\Util\RequestOptions */
    private $defaultOpts;
    /**
     * Initializes a new instance of the {@link BaseStripeClient} class.
     *
     * The constructor takes a single argument. The argument can be a string, in which case it
     * should be the API key. It can also be an array with various configuration settings.
     *
     * Configuration settings include the following options:
     *
     * - api_key (null|string): the Stripe API key, to be used in regular API requests.
     * - client_id (null|string): the Stripe client ID, to be used in OAuth requests.
     * - stripe_account (null|string): a Stripe account ID. If set, all requests sent by the client
     *   will automatically use the {@code Stripe-Account} header with that account ID.
     * - stripe_version (null|string): a Stripe API verion. If set, all requests sent by the client
     *   will include the {@code Stripe-Version} header with that API version.
     *
     * The following configuration settings are also available, though setting these should rarely be necessary
     * (only useful if you want to send requests to a mock server like stripe-mock):
     *
     * - api_base (string): the base URL for regular API requests. Defaults to
     *   {@link DEFAULT_API_BASE}.
     * - connect_base (string): the base URL for OAuth requests. Defaults to
     *   {@link DEFAULT_CONNECT_BASE}.
     * - files_base (string): the base URL for file creation requests. Defaults to
     *   {@link DEFAULT_FILES_BASE}.
     *
     * @param array<string, mixed>|string $config the API key as a string, or an array containing
     *   the client configuration settings
     */
    public function __construct($config = [])
    {
    }
    /**
     * Gets the API key used by the client to send requests.
     *
     * @return null|string the API key used by the client to send requests
     */
    public function getApiKey()
    {
    }
    /**
     * Gets the client ID used by the client in OAuth requests.
     *
     * @return null|string the client ID used by the client in OAuth requests
     */
    public function getClientId()
    {
    }
    /**
     * Gets the base URL for Stripe's API.
     *
     * @return string the base URL for Stripe's API
     */
    public function getApiBase()
    {
    }
    /**
     * Gets the base URL for Stripe's OAuth API.
     *
     * @return string the base URL for Stripe's OAuth API
     */
    public function getConnectBase()
    {
    }
    /**
     * Gets the base URL for Stripe's Files API.
     *
     * @return string the base URL for Stripe's Files API
     */
    public function getFilesBase()
    {
    }
    /**
     * Sends a request to Stripe's API.
     *
     * @param string $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * @return \Stripe\StripeObject the object returned by Stripe's API
     */
    public function request($method, $path, $params, $opts)
    {
    }
    /**
     * Sends a request to Stripe's API.
     *
     * @param string $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * @return \Stripe\Collection of ApiResources
     */
    public function requestCollection($method, $path, $params, $opts)
    {
    }
    /**
     * @param \Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\AuthenticationException
     *
     * @return string
     */
    private function apiKeyForRequest($opts)
    {
    }
    /**
     * TODO: replace this with a private constant when we drop support for PHP < 5.
     *
     * @return array<string, mixed>
     */
    private function getDefaultConfig()
    {
    }
    /**
     * @param array<string, mixed> $config
     *
     * @throws \Stripe\Exception\InvalidArgumentException
     */
    private function validateConfig($config)
    {
    }
}