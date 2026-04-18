<?php

namespace Stripe\Service\TestHelpers\Treasury;

/**
 * Service factory class for API resources in the Treasury namespace.
 *
 * @property InboundTransferService $inboundTransfers
 * @property OutboundPaymentService $outboundPayments
 * @property OutboundTransferService $outboundTransfers
 * @property ReceivedCreditService $receivedCredits
 * @property ReceivedDebitService $receivedDebits
 */
class TreasuryServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['inboundTransfers' => \Stripe\Service\TestHelpers\Treasury\InboundTransferService::class, 'outboundPayments' => \Stripe\Service\TestHelpers\Treasury\OutboundPaymentService::class, 'outboundTransfers' => \Stripe\Service\TestHelpers\Treasury\OutboundTransferService::class, 'receivedCredits' => \Stripe\Service\TestHelpers\Treasury\ReceivedCreditService::class, 'receivedDebits' => \Stripe\Service\TestHelpers\Treasury\ReceivedDebitService::class];
    protected function getServiceClass($name)
    {
    }
}