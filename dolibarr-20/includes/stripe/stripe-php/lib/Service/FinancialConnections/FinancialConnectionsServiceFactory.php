<?php

namespace Stripe\Service\FinancialConnections;

/**
 * Service factory class for API resources in the FinancialConnections namespace.
 *
 * @property AccountService $accounts
 * @property SessionService $sessions
 */
class FinancialConnectionsServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['accounts' => \Stripe\Service\FinancialConnections\AccountService::class, 'sessions' => \Stripe\Service\FinancialConnections\SessionService::class];
    protected function getServiceClass($name)
    {
    }
}