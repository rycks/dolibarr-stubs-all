<?php

namespace Stripe\Service;

/**
 * Abstract base class for all service factories used to expose service
 * instances through {@link \Stripe\StripeClient}.
 *
 * Service factories serve two purposes:
 *
 * 1. Expose properties for all services through the `__get()` magic method.
 * 2. Lazily initialize each service instance the first time the property for
 *    a given service is used.
 */
abstract class AbstractServiceFactory
{
    /** @var \Stripe\StripeClientInterface */
    private $client;
    /** @var array<string, AbstractService|AbstractServiceFactory> */
    private $services;
    /**
     * @param \Stripe\StripeClientInterface $client
     */
    public function __construct($client)
    {
    }
    /**
     * @param string $name
     *
     * @return null|string
     */
    protected abstract function getServiceClass($name);
    /**
     * @param string $name
     *
     * @return null|AbstractService|AbstractServiceFactory
     */
    public function __get($name)
    {
    }
    /**
     * @param string $name
     *
     * @return null|AbstractService|AbstractServiceFactory
     */
    public function getService($name)
    {
    }
}