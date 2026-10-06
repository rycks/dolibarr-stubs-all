<?php

namespace Stripe\Service\TestHelpers;

/**
 * Service factory class for API resources in the TestHelpers namespace.
 *
 * @property CustomerService $customers
 * @property Issuing\IssuingServiceFactory $issuing
 * @property RefundService $refunds
 * @property Terminal\TerminalServiceFactory $terminal
 * @property TestClockService $testClocks
 * @property Treasury\TreasuryServiceFactory $treasury
 */
class TestHelpersServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['customers' => \Stripe\Service\TestHelpers\CustomerService::class, 'issuing' => \Stripe\Service\TestHelpers\Issuing\IssuingServiceFactory::class, 'refunds' => \Stripe\Service\TestHelpers\RefundService::class, 'terminal' => \Stripe\Service\TestHelpers\Terminal\TerminalServiceFactory::class, 'testClocks' => \Stripe\Service\TestHelpers\TestClockService::class, 'treasury' => \Stripe\Service\TestHelpers\Treasury\TreasuryServiceFactory::class];
    protected function getServiceClass($name)
    {
    }
}