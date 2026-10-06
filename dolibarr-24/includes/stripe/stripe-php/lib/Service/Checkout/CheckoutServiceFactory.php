<?php

namespace Stripe\Service\Checkout;

/**
 * Service factory class for API resources in the Checkout namespace.
 *
 * @property SessionService $sessions
 */
class CheckoutServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['sessions' => \Stripe\Service\Checkout\SessionService::class];
    protected function getServiceClass($name)
    {
    }
}