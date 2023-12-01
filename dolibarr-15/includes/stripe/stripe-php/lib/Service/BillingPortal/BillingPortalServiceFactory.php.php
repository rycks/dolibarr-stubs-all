<?php

namespace Stripe\Service\BillingPortal;

/**
 * Service factory class for API resources in the BillingPortal namespace.
 *
 * @property SessionService $sessions
 */
class BillingPortalServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['sessions' => \Stripe\Service\BillingPortal\SessionService::class];
    protected function getServiceClass($name)
    {
    }
}