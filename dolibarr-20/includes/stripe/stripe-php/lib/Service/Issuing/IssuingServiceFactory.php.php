<?php

namespace Stripe\Service\Issuing;

/**
 * Service factory class for API resources in the Issuing namespace.
 *
 * @property AuthorizationService $authorizations
 * @property CardholderService $cardholders
 * @property CardService $cards
 * @property DisputeService $disputes
 * @property TransactionService $transactions
 */
class IssuingServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['authorizations' => \Stripe\Service\Issuing\AuthorizationService::class, 'cardholders' => \Stripe\Service\Issuing\CardholderService::class, 'cards' => \Stripe\Service\Issuing\CardService::class, 'disputes' => \Stripe\Service\Issuing\DisputeService::class, 'transactions' => \Stripe\Service\Issuing\TransactionService::class];
    protected function getServiceClass($name)
    {
    }
}