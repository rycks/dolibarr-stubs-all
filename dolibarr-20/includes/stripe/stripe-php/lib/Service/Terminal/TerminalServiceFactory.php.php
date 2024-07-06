<?php

namespace Stripe\Service\Terminal;

/**
 * Service factory class for API resources in the Terminal namespace.
 *
 * @property ConfigurationService $configurations
 * @property ConnectionTokenService $connectionTokens
 * @property LocationService $locations
 * @property ReaderService $readers
 */
class TerminalServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['configurations' => \Stripe\Service\Terminal\ConfigurationService::class, 'connectionTokens' => \Stripe\Service\Terminal\ConnectionTokenService::class, 'locations' => \Stripe\Service\Terminal\LocationService::class, 'readers' => \Stripe\Service\Terminal\ReaderService::class];
    protected function getServiceClass($name)
    {
    }
}