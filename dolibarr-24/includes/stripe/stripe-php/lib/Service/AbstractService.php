<?php

namespace Stripe\Service;

/**
 * Abstract base class for all services.
 */
abstract class AbstractService
{
    /**
     * @var \Stripe\StripeClientInterface
     */
    protected $client;
    /**
     * @var \Stripe\StripeStreamingClientInterface
     */
    protected $streamingClient;
    /**
     * Initializes a new instance of the {@link AbstractService} class.
     *
     * @param \Stripe\StripeClientInterface $client
     */
    public function __construct($client)
    {
    }
    /**
     * Gets the client used by this service to send requests.
     *
     * @return \Stripe\StripeClientInterface
     */
    public function getClient()
    {
    }
    /**
     * Gets the client used by this service to send requests.
     *
     * @return \Stripe\StripeStreamingClientInterface
     */
    public function getStreamingClient()
    {
    }
    /**
     * Translate null values to empty strings. For service methods,
     * we interpret null as a request to unset the field, which
     * corresponds to sending an empty string for the field to the
     * API.
     *
     * @param null|array $params
     */
    private static function formatParams($params)
    {
    }
    protected function request($method, $path, $params, $opts)
    {
    }
    protected function requestStream($method, $path, $readBodyChunkCallable, $params, $opts)
    {
    }
    protected function requestCollection($method, $path, $params, $opts)
    {
    }
    protected function requestSearchResult($method, $path, $params, $opts)
    {
    }
    protected function buildPath($basePath, ...$ids)
    {
    }
}