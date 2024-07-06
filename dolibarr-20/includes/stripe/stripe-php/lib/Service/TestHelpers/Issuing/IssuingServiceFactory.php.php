<?php

namespace Stripe\Service\TestHelpers\Issuing;

/**
 * Service factory class for API resources in the Issuing namespace.
 *
 * @property CardService $cards
 */
class IssuingServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['cards' => \Stripe\Service\TestHelpers\Issuing\CardService::class];
    protected function getServiceClass($name)
    {
    }
}