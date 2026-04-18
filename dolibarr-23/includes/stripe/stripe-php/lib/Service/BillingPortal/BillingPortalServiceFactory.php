<?php

namespace Stripe\Service\BillingPortal;

/**
 * Service factory class for API resources in the BillingPortal namespace.
 *
 * @property ConfigurationService $configurations
 * @property SessionService $sessions
 */
class BillingPortalServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['configurations' => \Stripe\Service\BillingPortal\ConfigurationService::class, 'sessions' => \Stripe\Service\BillingPortal\SessionService::class];
    protected function getServiceClass($name)
    {
    }
}