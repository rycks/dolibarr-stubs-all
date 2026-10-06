<?php

namespace Stripe\Service\Treasury;

/**
 * Service factory class for API resources in the Treasury namespace.
 *
 * @property CreditReversalService $creditReversals
 * @property DebitReversalService $debitReversals
 * @property FinancialAccountService $financialAccounts
 * @property InboundTransferService $inboundTransfers
 * @property OutboundPaymentService $outboundPayments
 * @property OutboundTransferService $outboundTransfers
 * @property ReceivedCreditService $receivedCredits
 * @property ReceivedDebitService $receivedDebits
 * @property TransactionEntryService $transactionEntries
 * @property TransactionService $transactions
 */
class TreasuryServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['creditReversals' => \Stripe\Service\Treasury\CreditReversalService::class, 'debitReversals' => \Stripe\Service\Treasury\DebitReversalService::class, 'financialAccounts' => \Stripe\Service\Treasury\FinancialAccountService::class, 'inboundTransfers' => \Stripe\Service\Treasury\InboundTransferService::class, 'outboundPayments' => \Stripe\Service\Treasury\OutboundPaymentService::class, 'outboundTransfers' => \Stripe\Service\Treasury\OutboundTransferService::class, 'receivedCredits' => \Stripe\Service\Treasury\ReceivedCreditService::class, 'receivedDebits' => \Stripe\Service\Treasury\ReceivedDebitService::class, 'transactionEntries' => \Stripe\Service\Treasury\TransactionEntryService::class, 'transactions' => \Stripe\Service\Treasury\TransactionService::class];
    protected function getServiceClass($name)
    {
    }
}