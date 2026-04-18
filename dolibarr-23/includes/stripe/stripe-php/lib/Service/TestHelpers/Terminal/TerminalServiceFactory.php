<?php

namespace Stripe\Service\TestHelpers\Terminal;

/**
 * Service factory class for API resources in the Terminal namespace.
 *
 * @property ReaderService $readers
 */
class TerminalServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['readers' => \Stripe\Service\TestHelpers\Terminal\ReaderService::class];
    protected function getServiceClass($name)
    {
    }
}